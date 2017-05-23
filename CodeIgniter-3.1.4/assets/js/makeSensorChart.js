 google.charts.load('current', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawCO2);
    google.charts.setOnLoadCallback(drawKetone);
    google.charts.setOnLoadCallback(drawHumid);
    google.charts.setOnLoadCallback(drawVOC);
    
    function drawChart() {
      var jsonData = $.ajax({
          url: "<?php echo base_url()."index.php/cDataPasien/getCOData/".$id;?>",
          dataType: "json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
      
      var options = {
        title: 'CO in patient',
        hAxis: {title: 'Time'},
        vAxis: {title: 'PPM'}
      };
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
        
    function drawCO2(){
        var co2Data = $.ajax({
            url: "<?php echo base_url()."index.php/cDataPasien/getCO2Data/".$id; ?>",
            dataType: "json",
            async: false
        }).responseText;
        
        var data = new google.visualization.DataTable(co2Data);
        
        var options = {
            title: 'CO2 in Patient',
            hAxis: {title: 'Time (s)'},
            vAxis: {title: 'PPM'}
        };
        
        var chartCO2 = new google.visualization.AreaChart(document.getElementById('chart_co2'));
        chartCO2.draw(data, options);
    }
        
      function drawKetone(){
        var ketoneData = $.ajax({
            url: "<?php echo base_url()."index.php/cDataPasien/getKetoneData/".$id; ?>",
            dataType: "json",
            async: false
        }).responseText;
        
        var data = new google.visualization.DataTable(ketoneData);
        
        var options = {
            title: 'Ketone in Patient',
            hAxis: {title: 'Time (s)'},
            vAxis: {title: 'PPM'}
        };
        
        var chartKetone = new google.visualization.AreaChart(document.getElementById('chart_ketone'));
        chartKetone.draw(data, options);
    }
        
    function drawHumid(){
        var humidData = $.ajax({
            url: "<?php echo base_url()."index.php/cDataPasien/getHumidData/".$id; ?>",
            dataType: "json",
            async: false
        }).responseText;
        
        var data = new google.visualization.DataTable(humidData);
        var options = {
            title: 'Humidity in Patient',
            hAxis: {title: 'Time (s)'},
            vAxis: {title: 'Pa'}
        };
        
        var chartHumid = new google.visualization.AreaChart(document.getElementById('chart_humid'));
        chartHumid.draw(data, options);
    }
        
    function drawVOC(){
        var vocData = $.ajax({
            url: "<?php echo base_url()."index.php/cDataPasien/getVOCData/".$id; ?>",
            dataType: "json",
            async: false
        }).responseText;
        
        var data = new google.visualization.DataTable(vocData);
        var options = {
            title: 'VOC in Patient',
            hAxis: {title: 'Time (s)'},
            vAxis: {title: 'Raw'}
        };
        
        var chartVOC = new google.visualization.AreaChart(document.getElementById('chart_voc'));
        chartVOC.draw(data, options);
    }