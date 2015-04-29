        var dataArray;  //储存案例数组
        var caseIndex = 0;  //当前案例索引
        var maxIndex = 0;   //案例最大索引
        var caseType = "game";    //案例类型
        var imgName = "";       //图片路径

		if(isIE = navigator.userAgent.indexOf("MSIE")!=-1) { 
			//alert("IE浏览器不支持该功能,请更换浏览器");
		}
		if(isFirefox=navigator.userAgent.indexOf("Firefox")!=-1){ 
			createCaseDom('game');
		} 
		if(isChrome=navigator.userAgent.indexOf("Chrome")!=-1){ 
			createCaseDom('game');
		} 
		if(isSafari=navigator.userAgent.indexOf("Safari")!=-1) { 
			createCaseDom('game');
		}  
		if(isOpera=navigator.userAgent.indexOf("Opera")!=-1){ 
			createCaseDom('game');
		}
		
		//createCaseDom('game');

        $(document).ready(function () {
            $("#nav a").click(function () {
                var num = $("#nav a").index(this);
                Loadpage(num);
            });
            autoTabChange();
            /*从首页跳转过来自动转入对应的标签页*/
            function autoTabChange() {
                var tid = getQueryString("tid");
                if (tid != null && tid < 6) {
                    Loadpage(tid);
                } else {
                    Loadpage(0);
                }
            }
        });
		
		function Loadpage(num) {

                var pageHtm = $("#ulMainCon").children().eq(num).html();
                var htmls = '<div class="page_con" style="margin-left: -776px;">' + pageHtm + '</div>';
                $("#ifrOvr").prepend(htmls);
                $("#nav a").each(function (key, val) {

                    var cssCls = val.className.split("_");

                    if (key == num) {
                        $(val).attr("class", cssCls[0] + "_" + cssCls[1] + "_hover");
                    } else {
                        $(val).attr("class", cssCls[0] + "_" + cssCls[1]);
                    }

                });

                $("#ifrOvr div:first").stop().animate({ "margin-left": 0 }, 600, function () {
                    $("#ifrOvr .page_con:last").remove();
                    //$("#ifrOvr .page_con:first").html(htmls);
                    createNavFunc();
                });
                if (num == 5) {
                    loadScroll();
                    bindTypeTxtEvent();
                    //bindShowDialogEvent();
                }
                bindFaceEvent();
            }

            //获取URL参数
            function getQueryString(name) {
                var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
                var r = window.location.search.substr(1).match(reg);
                if (r != null) return unescape(r[2]); return null;
            }

            bindFaceEvent();
            //员工照片鼠标滑过高亮
            function bindFaceEvent() {
                $("#facePic li").mouseover(function () {
                    $(this).find("p").stop().animate({ "left": "-86px" }, 100);
                });
                $("#facePic li").mouseout(function () {
                    $(this).find("p").stop().animate({ "left": "0" }, 100);
                });
            }

            /*招聘*/
            var autoRun = 0;
            var jobIndex = 0;
            function gid(id) {
                return document.getElementById(id)
            }
            function jobTabChange(ntype, num) {
                if (ntype == null) {
                    jobIndex = num;
                } else {
                    if (ntype == 'left') {
                        if (jobIndex > 0) {
                            jobIndex--;
                        } else {
                            jobIndex = 2;
                        }
                    } else {
                        if (jobIndex < 2) {
                            jobIndex++;
                        } else {
                            jobIndex = 0;
                        }
                    }
                }
                //clearTimeout(autoRun);
                var btnItems = gid('ulTab').getElementsByTagName('a');
                for (var i = 0; i < btnItems.length; i++) {
                    if (i == jobIndex) {
                        btnItems[jobIndex].className = "ico_sp btn_job_ico_act";
                        gid("jobTitle" + jobIndex).style.display = "block";
                        gid('jobDetail' + jobIndex).style.display = "block";

                    } else {
                        btnItems[i].className = "ico_sp btn_job_ico";
                        gid("jobTitle" + i).style.display = "none";
                        gid('jobDetail' + i).style.display = "none";
                    }
                }
                //autoRun = setTimeout("jobTabChange()", 2000);
            }
            //autoRun = setTimeout("jobTabChange()", 2000);


            /*案例展示*/
            //底部滚动链接
            function loadScroll() {
                var shopScroll = new ScrollPic();
                shopScroll.scrollContId = "rollbox"; //内容容器ID
                shopScroll.arrLeftId = "m_right";//左箭头ID
                shopScroll.arrRightId = "m_left"; //右箭头ID
                shopScroll.frameWidth = 600;//显示框宽度
                shopScroll.pageWidth = 120; //翻页宽度
                shopScroll.speed = 10; //移动速度(单位毫秒，越小越快)
                shopScroll.space = 10; //每次移动像素(单位px，越大越快)
                shopScroll.autoPlay = false; //自动播放
                shopScroll.autoPlayTime = 3; //自动播放间隔时间(秒)
                shopScroll.initialize(); //初始化
            }
			
			
			//生成案例html					
            function createCaseDom(ntype) {
                var htmls = "";
                if (ntype == 'game') {
                    dataArray = gameArr;
                    maxIndex = gameArr.length - 1;
                    imgName = "game/show_game_big_";
                } else {
                    dataArray = movieArr;
                    maxIndex = movieArr.length - 1;
                    imgName = "movie/show_movie_big_";
                }
                caseType = ntype;
                var clsFrist = "";
                for (var i = 0; i < 5; i++) {
                    htmls += '<li><a href="javascript:protflioChange(' + i + ');">';
                    if (i == 0) {
                        htmls += '<img class="on" src="' + dataArray[i].minImg + '" alt="" width="114" height="71" /></a></li>';
                    } else {
                        htmls += '<img src="' + dataArray[i].minImg + '" alt="" width="114" height="71" /></a></li>';
                    }

                }
                $("#caseImg span").click(function () {
                    var lr = $("#caseImg span").index($(this)) == 0 ? 'left' : 'right';

                    showCase(lr);
                });
                $("#ulMainCon #rollimg").html(htmls);
            }
			
			//预览不同案例
            function protflioChange(num) {
                var img = new Image();
                var imgUrl = "http://www.autosi.com.cn/palwonew/images/case/mid/" + caseType + "/show_game_mid_" + +num + ".jpg";

                img.onload = function () {

                    $("#protflioCon").css("background-image", "url('" + imgUrl + "')");
                    $("#protflioCon").attr("href", "javascript:showCase(" + num + ")");
                    $("#rollbox a img").attr("class", "");
                    for (var i = 0; i < $(".rollimg").length ; i++) {
                        $(".rollimg").eq(i).find("a img").eq(num).attr("class", "on");
                    }


                }
                img.src = imgUrl;
            }

            //$("#protflioCon").click(function() {
            //    showCase();
            //});
            //配置弹出层，传入id
            function TGDialogS(e) { showDialog.show({ id: e, bgcolor: "#fff", opacity: 70 }); }



            function showCase(num) {

                /*左、右按钮或点击小图*/
                if (num == "left") {
                    if (caseIndex > 0) {
                        caseIndex--;
                    } else {
                        return;
                    }
                } else if (num == 'right') {
                    if (caseIndex < maxIndex) {
                        caseIndex++;
                    } else {
                        return;
                    }
                } else {
                    caseIndex = num;
                }


                var imgTmp = new Image();
                var imgUrl = "http://www.autosi.com.cn/palwonew/images/case/big/" + imgName + caseIndex + ".jpg";
                imgTmp.onload = function () {
                    $("#showDialog").width(imgTmp.width).height(imgTmp.height);;
                    $("#caseImg").css({ "background-image": "url('" + imgUrl + "')", "width": imgTmp.width, "height": imgTmp.height });
                    TGDialogS('showDialog');
                    $("#caseImg .left_btn").css({ "width": imgTmp.width / 3, "height": imgTmp.height });
                    $("#caseImg .right_btn").css({ "width": imgTmp.width / 3, "height": imgTmp.height });
                }
                imgTmp.src = imgUrl;
            }


            fjMovie();
            function fjMovie() {
                $("#movieFj").animate({ //飞机向左移动。
                    left: window.screen.width + 'px'
                }, 6000, function () {
                    $("#movieFj").css({ "left": "-107px" });
                    $("#movieFj").animate({ "left": "680px" }, 6000);
                });
            }

            $("#movieFj").mouseover(function() {
                $("#movieFj").stop();
            });
            $("#movieFj").mouseout(function () {
                fjMovie();
            });

        function sampleShow(num){
            var num;
            if(num == 1){
                document.getElementById('box_sp').style.display="block";
            }
            else{
                document.getElementById('box_sp').style.display="none";
            }

        }



        var winWidth = 0;

        var winHeight = 0;

        function findDimensions() // 函数：获取尺寸

        {

// 获取窗口宽度

            if (window.innerWidth)

            winWidth = window.innerWidth;

            else if ((document.body) && (document.body.clientWidth))

            winWidth = document.body.clientWidth;

// 获取窗口高度

            if (window.innerHeight)

            winHeight = window.innerHeight;

            else if ((document.body) && (document.body.clientHeight))

            winHeight = document.body.clientHeight;

// 通过深入 Document 内部对 body 进行检测，获取窗口大小

            if (document.documentElement && document.documentElement.clientHeight && document.documentElement.clientWidth)

            {

            winHeight = document.documentElement.clientHeight;

            winWidth = document.documentElement.clientWidth;

            }

        // 结果输出至两个文本框

        /* document.form1.availHeight.value= winHeight;

        document.form1.availWidth.value= winWidth;*/
        //            alert(winWidth)
        if (winWidth < 1045){
            document.getElementById('fl_b').className="float1";
            }
        else{
            document.getElementById('fl_b').className="float";
            }

        }

        findDimensions();

        // 调用函数，获取数值

        window.onresize=findDimensions;


        /* H5案列导航 */
        function createNavFunc() {

            var htmlProtflioNav = $(".h5_protflio_nav li");
            var htmlProtflioCon = $(".h5_protflio_con ul");
            var current_arrow = $(".current_arrow");

            htmlProtflioNav.mouseover(function() {
                var index = htmlProtflioNav.index($(this));
                switch(index) {
                    case 0:
                        current_arrow.stop().animate({"top": 40}, 150);
                        break;
                    case 1:
                        current_arrow.stop().animate({"top": 76}, 150);
                        break;
                    case 2:
                        current_arrow.stop().animate({"top": 112}, 150);
                        break;
                    case 3:
                        current_arrow.stop().animate({"top": 148}, 150);
                        break;
                }

                htmlProtflioNav.removeClass("current");

                htmlProtflioNav.eq(index).addClass("current");
                htmlProtflioNav.eq(index + 4).addClass("current");

                htmlProtflioCon.addClass("none");
                htmlProtflioCon.eq(index).removeClass("none");
                htmlProtflioCon.eq(index + 4).removeClass("none");

            });
                console.log(htmlProtflioCon.length);

        }
