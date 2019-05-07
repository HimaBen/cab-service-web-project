function calculateTr() {
                    var vehicle = document.aa.vt.value;
                    var distance = document.aa.d.value;
          
                    if(vehicle == "car" && distance > 0){	
                        var final = (distance*70);
					    alert("your rate is: Rs."+ final);
                                            window.location = 'calculator.html';
					}
                                        
                    else if(vehicle == "van" && distance > 0){	
                        var final = (distance*100);
                                  
                        alert("your rate is: Rs."+ final);
                    }
                         
                    else{
                      alert("Please enter correctly");
                    }
                    
                    }