import requests
import yfinance as yf
from datetime import date
import plotly.express as px
import plotly.graph_objects as go
import matplotlib.pyplot as plt
import numpy as np
from sklearn.preprocessing import MinMaxScaler
from keras.models import Sequential
from keras.layers import Dense, Dropout, LSTM
import math
import pandas as pd


def predict(data):
    data = data.sort_index(ascending=True, axis = 0)
    data.assign(Date=data.index)
    close_data = pd.DataFrame(index=range(0,len(data)),columns=['Date', 'Close'])
    #print("dates: ", dates)
    dates = pd.to_datetime(data.index).tolist()
    print("asdfafds ", dates[0])

    #creates a new df with date as a column, in form of a string
    for i in range(0, len(data)):
        close_data['Date'][i] = str(dates[i])
        close_data['Close'][i] = data['Close'][i]
    #close_data = close_data.reset_index(drop=True)
    #print("close_data: ", close_data)

    ########
    close_data.index = close_data.Date
    close_data.drop('Date', axis = 1, inplace = True)

    close_values = close_data.values    #may cause issue, to_numpy() instead?


    train_split_index = math.floor(len(close_values)*0.85) #also defines how far into the future we're predicting, #points
    print(close_values)
    print(train_split_index)
    train = close_values[0:train_split_index, :]
    valid = close_values[train_split_index:, :]

    downscale = MinMaxScaler(feature_range = (0,1))
    data_scaled = downscale.fit_transform(close_values)

    x_train, y_train = [], []
    for i in range(50, len(train)):
        x_train.append(data_scaled[i-50:i, 0])
        y_train.append(data_scaled[i,0])
    x_train, y_train = np.array(x_train), np.array(y_train)
    print("x_train: ", x_train, "\ny_train: ", y_train)
    x_train = np.reshape(x_train, (x_train.shape[0], x_train.shape[1], 1))

    network = Sequential()
    network.add(LSTM(units = 50, return_sequences = True, input_shape = (x_train.shape[1], 1)))
    network.add(LSTM(units = 50))
    network.add(Dense(1))               #Dense(1) works. trying to change to get prediction

    network.compile(loss = 'mean_squared_error', optimizer = 'adam')
    network.fit(x_train, y_train, epochs = 1, batch_size = 1, verbose = 2)      #batch_size = 1

    data_input = close_data[len(close_data) - len(valid) - 50:].values

    print("broop: ", len(close_data) - len(valid) - 50)

    print("data_input: ", data_input, "\ndata_input shape: ", data_input.shape)
    data_input = data_input.reshape(-1,1)
    data_input = downscale.transform(data_input)

    x_test = []     #works
    for i in range(50, data_input.shape[0]): #predict data points based off of previous 50 iteratively
        x_test.append(data_input[i-50:i, 0])
    x_test = np.array(x_test)
    print(x_test)

    ############del after
    x_test = np.reshape(x_test, (x_test.shape[0], x_test.shape[1],1))
    print("x_test reshaped", x_test, x_test.shape)

    x_test_check = []
    x_test2 = []

    print(data_input[-50:, 0])
    x_test_check.append(data_input[-50:, 0])
    x_test_check = np.array(x_test_check)
    print("x_test_check shape: ", x_test_check.shape[0], x_test_check.shape[1])
    x_test_check = np.reshape(x_test_check, (1, x_test_check.shape[1],1))
    print("x_test_check shape after: ", x_test_check.shape)
    print("x_test_check ", x_test_check, "\n x_test length", len(x_test_check), "\n len each x test ", len(x_test_check[0]))

    predictions = []
    for i in range(50):
        #print("i:", i)
        #x_test_check = np.delete(x_test_check, 0)
        #print("last check: ", x_test_check.shape)
        #x_test_check = np.reshape(x_test_check, (x_test_check.shape[0], x_test_check.shape[1],1))
        predicted_close = network.predict(x_test_check)
        predictions.append(predicted_close)
        #print("p_close", predicted_close)
        #add value to end of array, then go again
        predicted_close = np.array(predicted_close)
        x_test_check = np.append(x_test_check, predicted_close)
        x_test_check = x_test_check[1:]
        x_test_check = np.array(x_test_check)
        #print(x_test_check.shape)
        x_test_check = np.reshape(x_test_check, (1, x_test_check.shape[0],1))

        print("after append: ", x_test_check)

    print(predictions)

    #working code
    x_test = np.reshape(x_test, (x_test.shape[0], x_test.shape[1],1))
    #print("x_test ", x_test, "\n x_test length", len(x_test), "\n len each x test ", len(x_test[0]))
    #predicted_close = network.predict(x_test)
    #predicted_close = downscale.inverse_transform(predicted_close)
    #print(predicted_close, len(predicted_close))

    #rms = np.sqrt(np.mean(np.power((valid - predicted_close), 2)))

    #print(rms)

    #for testing
    #valid['Predictions'] = predicted_close
    #plt.plot(train['Close'])
    #plt.plot(valid[['Close', 'Predictions']])
    print(len(train))
    print(len(valid))



def getCurrentDate():
    current_date = date.today()
    formatted_date = current_date.strftime("%Y-%m-%d")
    print(formatted_date)
    return str(formatted_date)

def return_status(return_code):
    return {
        200: "retrieval successful.",
        301: "redirection.",
        400: "bad request.",
        401: "authentication failed.",
        403: "access forbidden.",
        404: "resource not found.",
        503: "server unprepared."
    } .get(return_code, "error code unknown: " + str(return_code))

    #prints a brief summary on a company.
def printSummary(symbol_name):
    symbol = yf.Ticker(symbol_name)
    print(symbol.info["longBusinessSummary"])

def retrieveSingularData(symbol_name, start_date = "none", end_date = getCurrentDate(), interval_t = "15m", period_t = "1mo"):
    symbol = yf.Ticker(symbol_name)
    if (start_date != "none" and end_date != getCurrentDate()):
        data = symbol.history(start_date, end_date, interval_t, period_t)
        data.dropna() #drop rows with any NaN values
        print(data)
        return data
    else:
        data = symbol.history(period_t, interval_t)
        data.dropna() #drop rows with any NaN values
        return data

    #downloads data from multiple companys. symbol_names form: "AAPL AMZN TSLA"
def retrieveMultipleData(symbol_names, start_date = "2020-01-01", end_date = getCurrentDate(), interval_t = "15m", period_t = "1mo"):
    if (start_date != "2020-01-01" and end_date != getCurrentDate()):
        data = yf.download(tickers = symbol_names, interval = interval_t, start = start_date, end = end_date, group_by = "ticker", prepost = False)
        data.dropna() #drop rows with any NaN values
        return data
    else:
        data = yf.download(tickers = symbol_names, interval = interval_t, period = period_t, group_by = "ticker", prepost = False)
        data.dropna() #drop rows with any NaN values
        return data

    #locally graphs data from a company. replace y_axis with desired data.
def graphSingularData(data, symbol_name, y_axis = "", graph_style = "lines", graph_title = " "):
    fig = go.Figure()

    fig.add_trace(go.Scatter(x = data.index,
                            #y = data[symbol_name][y_axis], #
                            y = data[y_axis],
                            name = symbol_name,
                            mode = graph_style))
    fig.update_layout(title = graph_title, xaxis_title = "date", yaxis_title = y_axis)
    return fig
    #fig.show()

def graphMultipleData(data, symbol_names, y_axis = "", graph_style = "lines", graph_title = " "):
    #graph styles: "lines+markers", "lines"
    symbol_names_list = symbol_names.split()
    fig = go.Figure()
    print(symbol_names_list)
    for i in range(len(symbol_names_list)):
        fig.add_trace(go.Scatter(x = data.index,
                            y = data[symbol_names_list[i]][y_axis],
                            name = symbol_names_list[i],
                            mode = graph_style))
    fig.update_layout(title = graph_title, xaxis_title = "date", yaxis_title = y_axis)
    #fig.show()
    return fig

def rollingMean(data): #gotta remove NaN to line up
    data_adj_close = data['Close']
    r_mean = data_adj_close.rolling(window = 8).mean() #window = # datapoints to average
    return r_mean

def graphRollingMean(r_mean, figure, symbol_name, graph_style = "lines"):
    figure.add_trace(go.Scatter(x = r_mean.index,
                            y = r_mean,
                            name = symbol_name + " mean",
                            mode = graph_style))
    figure.show()
#close = adjusted close
def returnRate(data):
    returns = data['Close']/data['Close'].shift(1) - 1
    returns.dropna()
    return returns

def graphRR(returns, symbol_name):
    fig = go.Figure()
    fig.add_trace(go.Scatter(x = returns.index,
                            y = returns,
                            name = symbol_name + " return rate",
                            mode = "lines"))

    zeros = [0] * len(returns.index)
    fig.add_trace(go.Scatter(x = returns.index,
                            y = zeros,
                            name = "0 reference",
                            mode = "lines"))
    fig.update_layout(title = symbol_name + " return rate", xaxis_title = "date", yaxis_title = "return rate")
    fig.show()

def graphRiskAndReturn(data, symbol_name):
    close_data_volatility = data['Close'].pct_change()
    fig = go.Figure()
    fig.add_trace(go.Scatter(x = [round(close_data_volatility.mean(), 5)],
                            y = [round(close_data_volatility.std(), 5)],
                            text = symbol_name,
                            name = symbol_name + " risk/return",
                            mode = "markers+text"))
    fig.show()


symbol_m = "AAPL AMZN"
symbol_s = "AAPL"
symbol_test = "AAPL"
#data = requests.get("https://api.iextrading.com/1.0/ref-data/symbols")
#data = yf.download(tickers = symbol, interval = "15m", start = "2020-01-01", end = getCurrentDate())
#data = yf.download(symbol, interval = "15m", start = "2020-01-01", end = getCurrentDate())

data_m = retrieveMultipleData(symbol_m, interval_t = "15m", period_t = "1mo")
data_s = retrieveSingularData(symbol_s, interval_t ="15m")

data_test = retrieveSingularData(symbol_test, interval_t = "1m", period_t = "1d")
print(data_test)
#print(data['AAPL'])
#print(data_s)
#data[symbol]['Close'].plot()
#plt.show()

predict(data_test)

singlegraph = graphSingularData(data_test, symbol_test, "Close")
rollmean = rollingMean(data_test)
#print(rollmean)
graphRollingMean(rollmean, singlegraph, symbol_test)
retrate = returnRate(data_test)
graphRR(retrate, symbol_test)
graphRiskAndReturn(data_test, symbol_test)
#graphMultipleData(data_m, symbol_m, "Close")

#print(data.columns.values[0][0])

#print(rollingMean(data_s, 100))

#if __name__ == '__main__':