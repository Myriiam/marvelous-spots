
let countries = document.getElementById('country');
countries.length = 0;

let defaultOption = document.createElement('option');
defaultOption.text = 'Choose a country';

countries.add(defaultOption);
countries.selectedIndex = 0;

var myHeaders = new Headers();
myHeaders.append("X-CSCAPI-KEY", "TVIzM2RxWkZidHNUUkhVT1ZKN3FtWERaTHo1MVdwSHdYSEkxS0Q1NQ==");

var requestOptions = {
  method: 'GET',
  headers: myHeaders,
  redirect: 'follow'
};

fetch("https://api.countrystatecity.in/v1/countries", requestOptions)
  .then(  
    function(response) {  
      if (response.status !== 200) {  
        console.warn('Looks like there was a problem. Status Code: ' + 
          response.status);  
        return;  
      }

      // Examine the text in the response  
      response.json().then(function(data) {  
        let option;
    
    	for (let i = 0; i < data.length; i++) {
          option = document.createElement('option');
      	  option.text = data[i].name;
      	  option.value = data[i].name;
          option.id = data[i].iso2;
      	  countries.add(option);
    	}    
      });  
    }  
  )  
  .catch(function(err) {  
    console.error('Fetch Error -', err);  
  });


  //Add an event onChange to select the value of the select option
  document.getElementById('country').addEventListener('change', function() {
        
    let cities = document.getElementById('city');
    cities.length = 0;

    let defaultOption = document.createElement('option');
    defaultOption.text = 'Choose a city';

    cities.add(defaultOption);
    cities.selectedIndex = 0;

    const index = this.selectedIndex;
    const selectedIso = this.options[index].id;
    
    let url = "https://api.countrystatecity.in/v1/countries/"+ selectedIso +"/cities";

    var headers = new Headers();
    headers.append("X-CSCAPI-KEY", "TVIzM2RxWkZidHNUUkhVT1ZKN3FtWERaTHo1MVdwSHdYSEkxS0Q1NQ==");

    var requestCitiesOptions = {
    method: 'GET',
    headers: headers,
    redirect: 'follow'
    };

   fetch(url, requestCitiesOptions)
    .then(  
        function(response) {  
          if (response.status !== 200) {  
            console.warn('Looks like there was a problem. Status Code: ' + 
              response.status);  
            return;  
          }
    
          // Examine the text in the response  
          response.json().then(function(data) {  
            let option;
        
            for (let i = 0; i < data.length; i++) {
              option = document.createElement('option');
                option.text = data[i].name;
                option.value = data[i].name;
                cities.add(option);
            }    
          });  
        }  
      )  
      .catch(function(err) {  
        console.error('Fetch Error -', err);  
      });

    });