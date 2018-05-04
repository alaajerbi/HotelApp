function compare(){
	deb = document.getElementById("deb").value;
	fin = document.getElementById("fin").value;
	if( (new Date(deb).getTime() > new Date(fin).getTime()))
	{
		confirm("La date de debut doit etre inferieure à la date de la fin!");
		return false;
	
	}
	return true;
}
function verif(){
	return compare();
}