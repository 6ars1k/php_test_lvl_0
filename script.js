$(document).ready(function () {
  $('input[type="number"]').change(function (e) {
    let quartals = document.querySelectorAll('input[name*="q"]');
    quartals.forEach(function (element) {
      let firstMonth = Math.round(parseFloat(element.parentNode.previousElementSibling.previousElementSibling.previousElementSibling.firstChild.value)*100)/100|| 0;
      let secondMonth = Math.round(parseFloat(element.parentNode.previousElementSibling.previousElementSibling.firstChild.value)*100)/100|| 0;
      let thirdMonth = Math.round(parseFloat(element.parentNode.previousElementSibling.firstChild.value)*100)/100|| 0;
      let quartalsSum = Math.round((firstMonth + secondMonth + thirdMonth)*100)/100;
      if (quartalsSum != 0){
      element.value = Math.round(((quartalsSum + 1)/3)*100)/100;
      }
      else {
      element.value = 0;
      }
    },false)
    let years = document.querySelectorAll('input[name*="ytd"]');
    years.forEach(function (element) {
      let firstQuartal = parseFloat(element.parentNode.parentNode.querySelector(':nth-child(5)').firstChild.value);
      let secondQuartal = parseFloat(element.parentNode.parentNode.querySelector(':nth-child(9)').firstChild.value);
      let thirdQuartal = parseFloat(element.parentNode.parentNode.querySelector(':nth-child(13)').firstChild.value);
      let fourthQuartal = parseFloat(element.parentNode.parentNode.querySelector(':nth-child(17)').firstChild.value);
      let yearSum = Math.round((firstQuartal + secondQuartal + thirdQuartal + fourthQuartal)*100)/100;
      if (yearSum != 0){
        element.value = Math.round(((yearSum + 1)/4)*100)/100;
      }
      else{
        element.value = 0;
      }

    },false)



  });
});
// 'use strict'
// let inputs = document.querySelectorAll('input);
// console.log(inputs);

// forEach(function (element) {
//
//   element.addEventListener('change', function () {
//
//
//     console.log(quartals);
//   },)
//
// }, false);


