
		document.getElementById("type-1").onclick = function(){
			document.getElementById("true-false").style.display = "block";
			document.getElementById("choise").style.display = "none";
			document.getElementById("multichoise").style.display = "none";
		}
		document.getElementById("type-2").onclick = function(){
			document.getElementById("true-false").style.display = "none";
			document.getElementById("choise").style.display = "block";
			document.getElementById("multichoise").style.display = "none";
		}
		document.getElementById("type-3").onclick = function(){
			document.getElementById("true-false").style.display = "none";
			document.getElementById("choise").style.display = "none";
			document.getElementById("multichoise").style.display = "block";
		}
// end option-type

		document.getElementById("add1").onclick = function(){
			document.getElementById("ans2").style.display = "block";
            document.getElementById("add1").style.display="none";
		}
		document.getElementById("add2").onclick = function(){
			document.getElementById("ans3").style.display = "block";
            document.getElementById("add2").style.display="none";
            document.getElementById("del2").style.display="none";
		}
		document.getElementById("add3").onclick = function(){
			document.getElementById("ans4").style.display = "block";
            document.getElementById("add3").style.display="none";
            document.getElementById("del3").style.display="none";
		}
		document.getElementById("add4").onclick = function(){
			document.getElementById("ans5").style.display = "block";
            document.getElementById("add4").style.display="none";
            document.getElementById("del4").style.display="none";
		}
        document.getElementById("add5").onclick = function(){
			document.getElementById("ans6").style.display = "block";
            document.getElementById("add5").style.display="none";
            document.getElementById("del5").style.display="none";
		}
        document.getElementById("add6").onclick = function(){
			document.getElementById("ans7").style.display = "block";
            document.getElementById("add6").style.display="none";
            document.getElementById("del6").style.display="none";
		}
        document.getElementById("add7").onclick = function(){
			document.getElementById("ans8").style.display = "block";
            document.getElementById("add7").style.display="none";
            document.getElementById("del7").style.display="none";
		}
        document.getElementById("add8").onclick = function(){
			document.getElementById("ans9").style.display = "block";
            document.getElementById("add8").style.display="none";
            document.getElementById("del8").style.display="none";
		}
        document.getElementById("add9").onclick = function(){
			document.getElementById("ans10").style.display = "block";
            document.getElementById("add9").style.display="none";
            document.getElementById("del9").style.display="none";
		}
// end add question

        document.getElementById("del2").onclick = function(){
			document.getElementById("ans2").style.display = "none";
            document.getElementById("add1").style.display="block";
            document.getElementById("ans1").style.display="block";
		}
        document.getElementById("del3").onclick = function(){
			document.getElementById("ans3").style.display = "none";
            document.getElementById("add2").style.display="inline";
            document.getElementById("del2").style.display="inline";
            document.getElementById("ans2").style.display="block";
		}
        document.getElementById("del4").onclick = function(){
			document.getElementById("ans4").style.display = "none";
            document.getElementById("add3").style.display="inline";
            document.getElementById("del3").style.display="inline";
            document.getElementById("ans3").style.display="block";
		}
        document.getElementById("del5").onclick = function(){
			document.getElementById("ans5").style.display = "none";
            document.getElementById("add4").style.display="inline";
            document.getElementById("del4").style.display="inline";
            document.getElementById("ans4").style.display="block";
		}
        document.getElementById("del6").onclick = function(){
			document.getElementById("ans6").style.display = "none";
            document.getElementById("add5").style.display="inline";
            document.getElementById("del5").style.display="inline";
            document.getElementById("ans5").style.display="block";
		}
        document.getElementById("del7").onclick = function(){
			document.getElementById("ans7").style.display = "none";
            document.getElementById("add6").style.display="inline";
            document.getElementById("del6").style.display="inline";
            document.getElementById("ans6").style.display="block";
		}
        document.getElementById("del8").onclick = function(){
			document.getElementById("ans8").style.display = "none";
            document.getElementById("add7").style.display="inline";
            document.getElementById("del7").style.display="inline";
            document.getElementById("ans7").style.display="block";
		}
        document.getElementById("del9").onclick = function(){
			document.getElementById("ans9").style.display = "none";
            document.getElementById("add8").style.display="inline";
            document.getElementById("del8").style.display="inline";
            document.getElementById("ans8").style.display="block";
		}
        document.getElementById("del10").onclick = function(){
			document.getElementById("ans10").style.display = "none";
            document.getElementById("add9").style.display="inline";
            document.getElementById("del9").style.display="inline";
            document.getElementById("ans9").style.display="block";
		}