<html>
    <head>
        <script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
        <script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];</script>
    </head>
    <body>
        <div id='myChart'></div>
    </body>
</html>
<script type="text/javascript">
    zingchart.THEME="classic";
var myConfig = {
    "type":"bar3d",
    "background-color":"#f8f1ec #efdfd3",
    "font-family":"Arial",
    "3d-aspect":{
        "true3d":0,
        "y-angle":10,
        "depth":30
    },
    "title":{
        "text":"Expenses Calculation Chart",
        "background-color":"#BA7545 #825634",
        "height":"40px",
        "font-family":"Arial",
        "font-weight":"normal",
        "font-size":"18px",
        "text-color":"#ffffff"
    },
    "legend":{
        "layout":"float",
        "font-family":"Arial",
        "background-color":"none",
        "border-color":"none",
        "item":{
            "font-color":"#825634"
        },
        "x":"37%",
        "y":"10%",
        "width":"90%",
        "shadow":0
    },
    "plotarea":{
        "margin":"95px 35px 50px 70px",
        "background-color":"#fff",
        "alpha":0.3
    },
    "scale-y":{
        "background-color":"#fff",
        "border-width":"1px",
        "border-color":"#BA7545",
        "alpha":0.5,
        "format":"$%v",
        "guide":{
            "line-style":"solid",
            "line-color":"#BA7545",
            "alpha":0.2
        },
        "tick":{
            "line-color":"#BA7545",
            "alpha":0.2
        },
        "item":{
            "font-family":"Arial",
            "font-size":"11px",
            "font-color":"#825634",
            "padding-right":"6px"
        }
    },
    "scale-x":{
        "background-color":"#fff",
        "border-width":"1px",
        "border-color":"#BA7545",
        "alpha":0.5,
        "values":[
            <?php
            $purchase_detail = DB::table('expence')->select('*')->select('*')->get();
                $i=1;
                      foreach ($purchase_detail as $key => $value) {
                      ?>
                      "{{date('M', strtotime($purchase_detail[$key]->pur_date))}}",
            <?php
                      $i++;
                      }
                      ?>
           ],
        "guide":{
            "visible":false
        },
        "tick":{
            "line-color":"#BA7545",
            "alpha":0.2
        },
        "item":{
            "font-family":"Arial",
            "font-size":"11px",
            "font-color":"#825634"
        }
    },
    "series":[
        {
            "values":[

                 <?php
                      
                      $expence_details = DB::table('expence_grand_total')->select('*')
                      ->orderBy('id', 'asc')->get();
                      //print_r($expence_details);
                      $i=1;
                      foreach ($expence_details as $key => $value) {
                      ?>
                    "{{$expence_details[$key]->grand_total}}",
                <?php
                      $i++;
                      }
                      ?>
            ],
            "text":"Expenses",
            "background-color":"#767F59 #9BA95D",
            "border-color":"#59603D",
            "legend-marker":{
                "border-color":"#59603D"
            },
            "tooltip":{
                "background-color":"#59603D",
                "text":"$%v",
                "font-size":"12px",
                "font-family":"Arial",
                "padding":"6 12",
                "border-color":"none",
                "shadow":0,
                "border-radius":5
            }
        },
        
    ]
};
 
zingchart.render({ 
    id : 'myChart', 
    data : myConfig, 
    height: 500, 
    width: 725 
});
</script>
