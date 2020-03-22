import requests
import os
import sys
import timeit
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
import json

def retrieveSingularData(symbol_name):
    symbol = yf.Ticker(symbol_name)
    data = symbol.history(period="1mo")

    if data.empty:
        print(userInput, "is not a documented symbol.")
        return False
    else:
        print(userInput, "is a valid symbol.")
        return True
    #print(data)
    return data


if __name__ == '__main__':
    start_time = timeit.default_timer()
    userInput = str(sys.argv[1])

    if sys.argv[1] == "-info":
        print("\ntests whether a symbol exists, returns 0 for true, 1 for false.\n")
        stop_time = timeit.default_timer()
        sys.exit(0)

    userInput = userInput.upper()
    data = retrieveSingularData(userInput)

    stop_time = timeit.default_timer()
    print("program runtime: ", stop_time - start_time, " seconds.")

    if data == False:
        exit(1)
    else:
        exit(0)
