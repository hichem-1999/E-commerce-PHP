function searchPropositions(code)
		{
			var xhr=getXMLHttpRequest ();
			obj=document.getElementById("resultat");
			obj.innerHTML="";
			if(code!="d"){
				//code = document.getElementById("categorie").value;
				xhr.open("GET","index.php?action=getByCategorie&&code="+code,true);
				xhr.send();
				xhr.onreadystatechange=function()
				{	
					if ((xhr.readyState==4)&& (xhr.status==200))
					{
						obj.innerHTML=xhr.responseText;
					}
				}
			}
			else{
				location.reload();
			}
			
		}