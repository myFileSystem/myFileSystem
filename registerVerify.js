
    check_url = "checkUsername.php";
    _infoDivSuffix = "CheckDiv";   			//Message show in different divs they have a unique suffix

    //for creating XMLHttpRequest object
    function createXmlHttp() {
        var xmlHttp = null;
        //for window.XMLHttpRequest object
        if (window.XMLHttpRequest) {
           xmlHttp = new XMLHttpRequest();
		   //FireFox¡¢Opera browser--by XMLHttpRequest()function to create XMLHttpRequest
        } else {
   			var xmlhttp = ["MSXML2.XMLHTTP","Microsoft.XMLHTTP"];
   			for(var i=0;i<xmlhttp.length;i++){
            	if(xmlHttp = new ActiveXObject(xmlhttp[i]))  break;
   			}
  		}
        return xmlHttp;
    }

	//check the user name is available
	function checkNode(_node) {
        var nodeId = _node.id;          //get node id
        if (_node.value!="") {
            var xmlHttp=createXmlHttp();                       //create XmlHttpRequest object
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4) {
                    //to show feedback by showInfo function
                    showInfo("NewNameCheckDiv",xmlHttp.responseText);
                }
            }
            xmlHttp.open("POST", check_url, true);
            xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlHttp.send("name=" + encodeURIComponent(_node.value));//sent message with username
        }
    }

    //show the message feedback
    function showInfo(_infoDivId,text) {
        var infoDiv = document.getElementById(_infoDivId);  //get the element (whick div to show message)
  		infoDiv.className = "error";
        infoDiv.innerHTML = text;
    }


    //check the password input 2 times are same
    function checkPassword() {
        var p1 = document.getElementById("NewPass1").value;     //get new password 1
        var p2 = document.getElementById("NewPass2").value;    //get new password 2

        if (p1 != "" && p2 != "") {
            if (p1 != p2) {
                showInfo("NewPass2" + _infoDivSuffix, "The password you enter 2 times are different,Please check it again!");
            } else {
                showInfo("NewPass2" + _infoDivSuffix, "");
            }
        } else if (p1 != null) {
            showInfo("password" + _infoDivSuffix, "");
        }
    }