str="";
$(document).ready(function(){$("#uradio").click(function(){$("#consultantDetails").hide("slow");});});
$(document).ready(function(){$("#cradio").click(function(){$("#consultantDetails").show("slow");});});
if(str==="")
{
    str=document.getElementById("del").innerHTML;
    document.getElementById("del").innerHTML="";
}    
function deletes()
{
    if(str==="")
    {
        str=document.getElementById("del").innerHTML;
        document.getElementById("del").innerHTML="";
    }
}
function apply(obj)
{
    if(str!=="")
    {
        document.getElementById("del").innerHTML=str;
        str="";
    }
}