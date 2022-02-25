var start = 50;
var working = false;

$(document).ready(function() {

	$.ajax({

		type: "GET",
		url: "api/posts.php?user="+user,
		processData: false,
		contentType: "application/json",
		data: '',
		success: function(r) {
			var posts = JSON.parse(r)
			console.log(posts)
			$.each(posts, function(index) {
				$('.timelineposts').html(
					$('.timelineposts').html() + '<blockquote class="post"><header class="post_header"><img src="data/users/images/icons/default.jpg" style="border-radius: 100%;" class="post_img"><h2 class="post_channel_name">'+posts[index].PostChannel+'</h2><h4 class="post_member_name">'+posts[index].PostMember+'</h2></header><p>'+posts[index].PostBody+'</p><footer><button class="btn btn-default" data-id="'+posts[index].PostId+'" data-action="Like" type="button" style="color:#eb3b60;background-image:url(&quot;none&quot;);background-color:transparent;"><i class="glyphicon glyphicon-heart" data-aos="flip-right"></i><span>'+posts[index].PostLikes+' Likes</span></button><button class="btn btn-default comment" type="button" data-id="'+posts[index].PostId+'" data-action="Replys" style="color:#eb3b60;background-image:url(&quot;none&quot;);background-color:transparent;"><i class="glyphicon glyphicon-flash" style="color:#f9d616;"></i><span style="color:#f9d616;"> Replys</span></button></footer><div class="post_border" style="border-bottom:1px solid rgb(47, 51, 54);margin-top:15px"></div></blockquote>'
				)
			})
		}
	})

	// $('.menu_login').click(function(r) {
	// 	$.ajax({
	//
	// 		type: "GET",
	// 		url: "login.php",
	// 		processData: false,
	// 		contentType: "application/json",
	// 		data: '',
	// 		success: function(r) {
	// 			$(".login_popup").html(
	// 				r
	// 			)
	// 			$(".login_popup").show();
	// 		}
	//
	// 	})
	// })

	$(window).scroll(function() {
		if ($(this).scrollTop() + 1 >= $('body').height() - $(window).height()) {
			if (working == false) {
				working = true;
				$.ajax({
					type: "GET",
					url: "api/posts.php?start="+start+"&user="+user,
					processData: false,
					contentType: "application/json",
					data: '',
					success: function(r) {
						var posts = JSON.parse(r)
						$.each(posts, function(index) {
							$('.timelineposts').html(
								$('.timelineposts').html() + '<blockquote class="post"><header class="post_header"><img src="data/users/images/icons/default.jpg" style="border-radius: 100%;" class="post_img"><h2 class="post_channel_name">'+posts[index].PostChannel+'</h2><h4 class="post_member_name">'+posts[index].PostMember+'</h2></header><p>'+posts[index].PostBody+'</p><footer><button class="btn btn-default" data-id="'+posts[index].PostId+'" data-action="Like" type="button" style="color:#eb3b60;background-image:url(&quot;none&quot;);background-color:transparent;"><i class="glyphicon glyphicon-heart" data-aos="flip-right"></i><span><span class="likes">'+posts[index].PostLikes+'</span> Likes</span></button><button class="btn btn-default comment" type="button" data-id="'+posts[index].PostId+'" data-action="Replys" style="color:#eb3b60;background-image:url(&quot;none&quot;);background-color:transparent;"><i class="glyphicon glyphicon-flash" style="color:#f9d616;"></i><span style="color:#f9d616;"> Replys</span></button></footer><div class="post_border" style="border-bottom:1px solid rgb(47, 51, 54);margin-top:15px"></div></blockquote>'
							)
						})
						start += 15
						setTimeout(function() {
							working = false;
						}, 5000)
					}
				})
			}
		}
	})

	$('[data-action=Like]').click(function(r) {
		var id = $(this).data("id")
		console.log("hello");
		$.ajax({
			type: "GET",
			url: "api/like.php?id="+id,
			processData: false,
			contentType: "application/json",
			data: '',
			success: function(r) {
				console.log($(this).children());
			}
		})
	})

	$('.post_body').keypress(function(r) {
		updateCharLimit($(this), r)
	})

	$('.post_body').keyup(function(r) {
		updateCharLimit($(this), r)
	})

	function updateCharLimit(tis, r) {
		var chars = 255 - tis.val().length
		var num = $('.char_number_p')
		num.html(chars)
		if (chars <= 0) {
			red_char_number_animation(num)
		} else if (chars != 255) {
			$('input#post').prop('disabled', false)
		} else {
			$('input#post').prop('disabled', true)
		}
	}
})

var animating = [false]

function red_char_number_animation(tis) {
	var id = null
	var step = 0
	var red = 255
	if (!animating[0]) {
		animating[0] = true
		clearInterval(id)
		id = setInterval(frame, 10)
		function frame() {
			if (step == 100) {
				animating[0] = false
				clearInterval(id)
			} else if (step >= 40) {
				step++
				red -= 255/60
				tis.css("color", "rgb("+red+",0,0)")
			} else {
				step++
				tis.css("color", "#ff0000")
			}
		}
	}
}
