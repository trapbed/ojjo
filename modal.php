    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        <style>
            
        </style>
    </head>
    <body>
            

            <script>
                let inputs = document.getElementsByClassName("input");//input
                let labels = document.getElementsByClassName("label");//label
                for(let i=0 ; i<inputs.length ; i++) {
                    
                            inputs[i].onfocus = function( ){
                                labels[i].style.top = "0vmax";
                                labels[i].style.color = "white";
                                labels[i].style.paddingLeft = "0vmax";
                            }
                            
                            inputs[i].onblur = function(){
                                labels[i].style.color = "#333";
                                labels[i].style.top = "1.6vmax";
                                labels[i].style.paddingLeft = "1vmax";
                            }
                            // inputs[i].onchange = function(){
                            //     labels[i].style.top = "0vmax";
                            //     labels[i].style.color = "white";
                            //     labels[i].style.paddingLeft = "0vmax";
                            // }
                }
            </script>
    </body>
    </html>

            