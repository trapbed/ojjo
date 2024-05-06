<script>
                const input = document.getElementById("notMT").value;
                const label = document.getElementById("label");
                        if(empty(input)){
                            label.style.top = "-1.2vmax";
                            label.style.color = "white";
                        }
                        else{
                            label.style.color = "#333333";
                            label.style.top = "1vmax";
                        }
</script>