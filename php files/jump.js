function jump() {
    var selected = document.getElementsByName('querytype');

    for(var i=0; i<selected.length; i++) {
    var value = selected[i].value;
    if (selected[i].checked) {
        if (value == 'update') {
        window.location.href = 'http://localhost/test/update.php';
        }
		if (value == 'tviewnot'){
        window.location.href = 'http://localhost/test/viewnot.php';
        }
		if (value=='joinedt'){
			window.location.href = 'http://localhost/test/simplejoin.php';
		}
		if (value == 'delete') {
        window.location.href = 'http://localhost/test/delete.php';
		}
		if (value=='search'){
			window.location.href = 'http://localhost/test/test2.php';
		}
		if (value=='orderby'){
			window.location.href = 'http://localhost/test/orderbyform.php';
		}
		else if (value=='groupby'){
			window.location.href = 'http://localhost/test/groupbyform.php';
		}
		else if (value=='having'){
			window.location.href = 'http://localhost/test/havingform.php';
		}
		else if (value=='nested'){
			window.location.href = 'http://localhost/test/nestedform.php';
		}
		else if (value=='insertownersphones'){
			window.location.href = 'http://localhost/test/insertownersphone.php';
		}
		else if (value=='deleteownersphones'){
			window.location.href = 'http://localhost/test/deleteownersphone.php';
		}
		else if (value=='updateownersphones'){
			window.location.href = 'http://localhost/test/updateownersphone.php';
		}
		else if (value=='insertemployees'){
			window.location.href = 'http://localhost/test/insertemployee.php';
		}
		else if (value=='insert'){
			window.location.href = 'http://localhost/test/insert.php';
        }
		else if (value=='deleteemployees'){
			window.location.href = 'http://localhost/test/deleteemployee.php';
			}
		else if (value=='updateemployees'){
			window.location.href = 'http://localhost/test/updateemployee.php';
		}
		else if (value=='insertbusinessowners'){
			window.location.href = 'http://localhost/test/insertbusinessowners.php';
		}
		else if (value=='deletebusinessowners'){
			window.location.href = 'http://localhost/test/deletebusinessowner.php';
		}
		else if (value=='updatebusinessowners'){
			window.location.href = 'http://localhost/test/updatebusinessowner.php';
		}
		else if (value=='updateclients'){
			window.location.href = 'http://localhost/test/updateclient.php';
		}		
		else if (value=='insertclients'){
			window.location.href = 'http://localhost/test/insertclient.php';
		}
		else if (value=='deleteclients'){
			window.location.href = 'http://localhost/test/deleteclient.php';
		}
		else if (value=='insertclientphones'){
			window.location.href = 'http://localhost/test/insertclientphone.php';
		}
		else if (value=='deleteclientphones'){
			window.location.href = 'http://localhost/test/deleteclientphone.php';
		}
		else if (value=='updateclientphones'){
			window.location.href = 'http://localhost/test/updateclientphone.php';
		}
		else if (value=='updateowners'){
			window.location.href = 'http://localhost/test/updateowners.php';
		}
		else if (value=='insertowners'){
			window.location.href = 'http://localhost/test/insertowners.php';
		}
		else if (value=='deleteowners'){
			window.location.href = 'http://localhost/test/deleteowners.php';
		}
		else if (value=='updateprivateowners'){
			window.location.href = 'http://localhost/test/updateprivateowners.php';
		}
		else if (value=='insertprivateowners'){
			window.location.href = 'http://localhost/test/insertprivateowners.php';
		}
		else if (value=='deleteprivateowners'){
			window.location.href = 'http://localhost/test/deleteprivateowners.php';
		}
		else if (value=='insertcontracts'){
			window.location.href = 'http://localhost/test/insertcontract.php';
		}
		else if (value=='deletecontracts'){
			window.location.href = 'http://localhost/test/deletecontracts.php';
		}
		else if (value=='updatecontracts'){
			window.location.href = 'http://localhost/test/updatecontract.php';
		}
		else if (value=='insertproperties'){
			window.location.href = 'http://localhost/test/insertproperty.php';
		}
			else if (value=='deletenewspapers'){
			window.location.href = 'http://localhost/test/deletenewspaper.php';
		}
			else if (value=='deleteproperties'){
			window.location.href = 'http://localhost/test/deleteproperties.php';
		}
		else if (value=='insertnewspapers'){
			window.location.href = 'http://localhost/test/insertnewspaper.php';
		}
		//	else if (value=='deletepropertytypes'){
			//window.location.href = 'http://localhost/test/deletepropertytypes.php';
		//}
		//	else if (value=='insertpropertytypes'){
			//window.location.href = 'http://localhost/test/insertpropertytypes.php';
		//}
		//	else if (value=='updatepropertytypes'){
			//window.location.href = 'http://localhost/test/updatepropertytypes.php';
		//}
		else if (value=='updatenewspapers'){
			window.location.href = 'http://localhost/test/updatenewspaper.php';
		}
		else if (value=='updateproperties'){
			window.location.href = 'http://localhost/test/updateproperty.php';
		}
    }
}
}