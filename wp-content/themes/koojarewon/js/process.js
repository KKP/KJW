$(document).ready(function(){
    $("#slider p a").eq(1).css("display","none");
    var b_a=$("#footer_right #field_2_1 .gfield_label").text();
    var b_b=$("#footer_right #field_2_2 .gfield_label").text();
    var b_c=$("#footer_right #field_2_3 .gfield_label").text();
    $("#footer_right #field_2_1 #input_2_1").attr('value',b_a);
    $("#footer_right #field_2_2 #input_2_2").attr('value','Your Email Address');
    $("#footer_right #field_2_3 #input_2_3").attr('value',b_c);
    
    // code for quick contact
    
        $("#input_2_1").click(function(){
            if( $("#input_2_1").val()=='Your Name'){
                 $("#input_2_1").attr('value',''); 
            }
        });
        $("#input_2_1").blur(function(){
            if( $("#input_2_1").val()==''){
                 $("#input_2_1").attr('value','Your Name'); 
            }
        });
        // 2
        $("#input_2_2").click(function(){
            if( $("#input_2_2").val()=='Your Email Address'){
                 $("#input_2_2").attr('value',''); 
            }
        });
        $("#input_2_2").blur(function(){
            if( $("#input_2_2").val()==''){
                 $("#input_2_2").attr('value','Your Email Address'); 
            }
        });
        // 3
        $("#input_2_3").click(function(){
            if( $("#input_2_3").val()=='Your Message'){
                 $("#input_2_3").attr('value',''); 
            }
        });
        $("#input_2_3").blur(function(){
            if( $("#input_2_3").val()==''){
                 $("#input_2_3").attr('value','Your Message'); 
            }
        });
        $(".content_sidebar_header p a").html('Read More &rarr;');
        if($('body').hasClass('home'))
        {
            $("#header_bottom").show();
            $("#header_for_page").hide();
            $("#container").removeClass("border_content");
        }
        // if for header height
        if(!$('body').hasClass('home'))
        {
            $("#header").css("height","253px");
            $("#calendar_top").hide();
            $("#container").addClass("border_content");
        }
        // img for li folow us
        $("#join_us_icon ul li ul li").eq(0).addClass("f1");
        $("#join_us_icon ul li ul li").eq(1).addClass("f2");
        $("#join_us_icon ul li ul li").eq(2).addClass("f3");
        $("#join_us_icon ul li ul li").eq(3).addClass("f4");
        $("#join_us_icon ul li ul li").eq(4).addClass("f5");
        // targer for tag a in sidebar
        $("#content_menu_sidebar ul li a").attr('target','_blank');
});
