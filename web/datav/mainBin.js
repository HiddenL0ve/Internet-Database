'use strict';
import StackedBarChart from "./Bin.js";

fetch('/index.php?r=data/index')
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json(); // 直接解析JSON
  })
  .then(data => {
    StackedBarChart(data, {
      keys: ['1', '2', '3', '4', 'A', 'B', 'C', 'D', '7'],
      xLabel: "",
      yLabel: "Count",
    });
  })
  .catch(error => {
    console.error('There has been a problem with your fetch operation:', error);
  });