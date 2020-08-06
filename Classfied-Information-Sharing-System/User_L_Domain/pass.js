function Pass_function()
{
var s_code = document.form1.password;
	if(s_code.value !='Omkar')
	{
		window.alert("Incorrect site code");
		s_code.focus();
		return false;		
	}
		window.alert("Access granted");
		self.close();	
		window.open ('index1.html');		
	
}
