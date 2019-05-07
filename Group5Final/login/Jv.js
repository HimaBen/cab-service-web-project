function checkForm() {
                  if (document.log.User_Name.value==""){
                      alert("please input the name.");
                      return false;
                   }
                   if (document.log.Password.value==""){
                      alert("please enter the password.");
                      return false;
                 }
                 return window.alert('Hello ' + document.log.User_Name.value)
                  
                  }