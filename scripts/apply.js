// Use your own variable names and ids

"use strict";

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
} 

// Function to count to 120 seconds
var seconds = 0
setInterval(function () {
    seconds++;
    document.getElementById('comment').innerHTML = "Let's get started! Fill the form fast, you only have a minute!";
    if (seconds >30){
    	document.getElementById('comment').innerHTML = "Still filling it? Think of this as a typing test!";
    }
    if (seconds > 60){
    	document.getElementById('comment').innerHTML = "A super IT Consultant should type fast!";
    }
    if(seconds > 90){
		document.getElementById('comment').innerHTML = "Maybe you should try again, later!";
	}
	if(seconds >= 120){
		alert("Time's up! Try again later. You will be redirected back to the careers page.");
		window.location.href = "jobs.php";
	}
    var result = parseInt(seconds / 60) + ':' + seconds % 60; //formart seconds back into mm:ss 
    document.getElementById('timer').innerHTML = "Time taken so far: <br>"+result;
}, 1000) 


function saveJobReference(job_reference){
	if (typeof(Storage)!=="undefined"){
		localStorage.setItem("job_reference",job_reference)
	}
}

function loadJobReference(){
	if (typeof(Storage)!=="undefined"){
		if (localStorage.getItem("job_reference")!==null){
			var job_reference = document.getElementById("ref_id");
			job_reference.value = localStorage.getItem("job_reference");
			job_reference.readOnly = true;
		}
	}
}

function storeData(){
	// Get Values from Form
	var fname = document.getElementById("first_name").value.trim();
	var lname = document.getElementById("last_name").value.trim();
	var dob = document.getElementById("dob").value.trim();
	// set default value for gender
	var street_address = document.getElementById("street_address").value.trim();
	var suburb = document.getElementById("suburb").value.trim();
	// get checkbox element and check for validation
	var postcode = document.getElementById("postcode").value.trim();
	var email = document.getElementById("email").value.trim();
	var phone = document.getElementById("phone").value.trim();
	var state = document.getElementById("state").value.trim();
	// check for skills
	var other_skills_text = document.getElementById("other_skill_text").value.trim();
	
	if (typeof(Storage)!=="undefined"){
		localStorage.setItem("fname", fname);
		localStorage.setItem("lname", lname);
		localStorage.setItem("dob", dob);
		localStorage.setItem("street_address", street_address);
		localStorage.setItem("suburb", suburb);
		localStorage.setItem("postcode", postcode);
		localStorage.setItem("email", email);
		localStorage.setItem("phone", phone);
		localStorage.setItem("state", state);
		localStorage.setItem("other_skills_text", other_skills_text);
	}

	return true;
}

function loadData(){
	 if (typeof(Storage)!=="undefined"){
	 	if (localStorage.getItem("fname") !== null){   
			document.getElementById("first_name").value = localStorage.getItem("fname");	
		}
		if (localStorage.getItem("lname") !== null){   
			document.getElementById("last_name").value = localStorage.getItem("lname");	
		}
		if (localStorage.getItem("dob") !== null){   
			document.getElementById("dob").value = localStorage.getItem("dob");	
		}
		if (localStorage.getItem("street_address") !== null){   
			document.getElementById("street_address").value = localStorage.getItem("street_address");	
		}
		if (localStorage.getItem("suburb") !== null){   
			document.getElementById("suburb").value = localStorage.getItem("suburb");	
		}
		if (localStorage.getItem("postcode") !== null){   
			document.getElementById("postcode").value = localStorage.getItem("postcode");	
		}
		if (localStorage.getItem("email") !== null){   
			document.getElementById("email").value = localStorage.getItem("email");	
		}
		if (localStorage.getItem("phone") !== null){   
			document.getElementById("phone").value = localStorage.getItem("phone");	
		}
		if (localStorage.getItem("state") !== null){   
			document.getElementById("state").value = localStorage.getItem("state");	
		}
		if (localStorage.getItem("other_skills_text") !== null){   
			document.getElementById("other_skill_text").value = localStorage.getItem("other_skills_text");	
		}
	}
}

function init(){

	if (document.getElementById("apply_page")!=null){
		loadJobReference();
		loadData();
		var application_form = document.getElementById("application_form");
		application_form.onsubmit = storeData;
	}
	else if (document.getElementById("jobs_page")!=null){
		var apply_links = document.getElementsByClassName("apply_links");
		// console.log(apply_links);
		for (var i = 0; i<apply_links.length; i++){
			apply_links[i].onclick = function(){
				saveJobReference(this.id);
			}
		}
	}
}

window.onload = init;
