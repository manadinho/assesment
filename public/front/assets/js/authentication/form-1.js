var togglePassword = document.getElementById("toggle-password");

if (togglePassword) {
	togglePassword.addEventListener('click', function() {
	  var x = document.getElementById("password");
	  var y = document.getElementById("password_confirmation");
	  if (x.type === "password")
	  {
		x.type = "text";
	  } else
	  {
		x.type = "password";
	  }
	  if(y.type === "password")
	  {
		y.type = "text";
	  }
	  else
	  {
		y.type = "password";
	  }
	});
}
