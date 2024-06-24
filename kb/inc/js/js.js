var $=function(node){
return document.getElementById(node);
}
function $(objId){
return document.getElementById(objId);
}

function inst() {
if ($("code")!=null) $("code").value = $("tishi4").innerHTML;
}

function preview() { 
bdhtml=window.document.body.innerHTML; 
sprnstr="<!--startprint-->"; 
eprnstr="<!--endprint-->"; 
prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17); 
prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr)); 
window.document.body.innerHTML=prnhtml; 
window.print(); 
} 

function st(ids,Num){
if ($(ids).value == $("tishi"+Num).innerHTML){
$(ids).value = "";
}
}

function listSortBy(arr, field, order){ 
    var refer = [], result=[], order = order=='asc'?'asc':'desc', index; 
    for(i=0; i<arr.length; i++){ 
        refer[i] = arr[i][field]+':'+i; 
    } 
    refer.sort(); 
    if(order=='desc') refer.reverse(); 
    for(i=0;i<refer.length;i++){ 
        index = refer[i].split(':')[1]; 
        result[i] = arr[index]; 
    } 
    return result; 
}

var addressInit = function(_cmbProvince, _cmbCity, defaultProvince, defaultCity){
	var cmbProvince = document.getElementById(_cmbProvince);
	var cmbCity = document.getElementById(_cmbCity);
	function cmbSelect(cmb, str){
		for(var i=0; i<cmb.options.length; i++)	{
			if(cmb.options[i].value == str)	{
				cmb.selectedIndex = i;
				return;
			}
		}
	}
	function cmbAddOption(cmb, str, obj){
		var option = document.createElement("OPTION");
		cmb.options.add(option);
		option.innerHTML = str;
		option.value = str;
		option.obj = obj;
	}
	function changeProvince(){
		cmbCity.options.length = 0;
		if(cmbProvince.selectedIndex == -1)return;
		var item = cmbProvince.options[cmbProvince.selectedIndex].obj;
		item.cityList=listSortBy(item.cityList, 'name', 'desc');
		for(var i=0; i<item.cityList.length; i++){
			cmbAddOption(cmbCity, item.cityList[i], item.cityList[i]);
		}
		cmbSelect(cmbCity, defaultCity);
	}
	provinceList=listSortBy(provinceList, 'name', 'asc');
	for(var i=0; i<provinceList.length; i++){
		cmbAddOption(cmbProvince, provinceList[i].name, provinceList[i]);
	}
	cmbSelect(cmbProvince, defaultProvince);
	changeProvince();
	cmbProvince.onchange = changeProvince;
}
