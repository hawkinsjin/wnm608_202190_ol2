$("#navigations a").on("click",function(e){
	e.preventDefault();
	$(this).closest("li").addClass("active")
	.siblings().removeClass("active")
})
