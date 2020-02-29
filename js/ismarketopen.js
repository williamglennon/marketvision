function marketStatus(){
  var dateche = new Date();
  // 1 - Market Open, 2 - Market Closed, 3 - Pre-Trading
  // Closed on Weekends
  if (dateche.getDay() == 0 || dateche.getDay() == 6) {
    return 2;
  }
  // Closed on New Years
  if (dateche.getMonth() == 0 && dateche.getDate() == 1){
    return 2;
  }
  // Closed on 4th July
  if (dateche.getMonth() == 6 && dateche.getDate() == 4){
    return 2;
  }
  // Closed on Christmas
  if (dateche.getMonth() == 11 && dateche.getDate() == 25){
    return 2;
  }
  // Closed on MLK Day
  if (dateche.getMonth() == 0 && dateche.getDay() == 1){
    if (dateche.getDate() >= 15 && dateche.getDate() <= 21){
      return 2;
    }
  }
  // Closed on Presedents' Day
  if (dateche.getMonth() == 1 && dateche.getDay() == 1){
    if (dateche.getDate() >= 15 && dateche.getDate() <= 21){
      return 2;
    }
  // Closes early on Christmas Eve
  if (dateche.getMonth() == 11 && dateche.getDate() == 24){
    if (deteche.getHours() >= 13){
      return 2;
    }
  }
  //Closed for Good Friday
  //Closed for Thanksgiving
  //Closes early on Black Friday
  //Closed on Labor Day
  //Closed on Memorial Day
  //Market Hours
  if (dateche.getHours() == 9 && dateche.getMinutes() >= 30){
    return 1;
  }
  if (dateche.getHours() > 9 && dateche.getHours() < 20){
    return 1;
  }
  //Pre-Trading Hours
  if (dateche.getHours() >= 7 && dateche.getHours() < 20){
    return 3;
  }
  return 2;
}
