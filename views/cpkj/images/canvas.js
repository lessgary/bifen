//创建画布画直线
function canvasChecked(ball, color) {
    var temp = Number($("td." + ball + "").html()[0]);
    var lpos, cpos;
    $("td." + ball + "").each(function (i, span) {
        var w = $(this).width();
        var h = $(this).height();
        var pos = $(this).position();
        cpos = {
            'left_x': pos.left,
            'left_y': pos.top + h / 2,
            'right_x': pos.left + w,
            'right_y': pos.top + h / 2,
            'top_x': pos.left + w / 2,
            'top_y': pos.top,
            'bottom_x': pos.left + w / 2,
            'bottom_y': pos.top + h,
        };
        if (lpos) {
            var cvsid = ball + "_" + i;
            $("<canvas>", {
                "id": cvsid,
                css: {
                    "position": "absolute",
                }
            }).appendTo($("#mycanvas"));

            var can = document.getElementById(cvsid);
            var drawfrome, drawto;

            if (Number($(this).html()) == temp) {
                can.width = 2;
                can.height =8;
                $("#" + cvsid).css({ "top": lpos.bottom_y, "left": lpos.bottom_x });
                drawfrome = { 'x': 0, 'y': 0 };
                drawto = { 'x': 0, 'y': can.height };
            } else {
                if (Number($(this).html()) > temp) {
                    can.width = cpos.left_x - lpos.right_x;
                    can.height = cpos.left_y - lpos.right_y;

                    $("#" + cvsid).css({ "top": lpos.right_y, "left": lpos.right_x });
                    drawfrome = { 'x': 0, 'y': 0 };
                    drawto = { 'x': can.width, 'y': can.height };
                } else {
                    can.width = lpos.left_x - cpos.right_x;
                    can.height = cpos.left_y - lpos.left_y;

                    $("#" + cvsid).css({ "top": lpos.left_y, "left": cpos.right_x });
                    drawfrome = { 'x': can.width, 'y': 0 };
                    drawto = { 'x': 0, 'y': can.height };
                }
            }
            var ctx = can.getContext('2d');
            ctx.strokeStyle = color;
            ctx.lineWidth = 1;
            ctx.beginPath();
            ctx.moveTo(drawfrome.x, drawfrome.y);
            ctx.lineTo(drawto.x, drawto.y);
            ctx.closePath();
            ctx.stroke();
        }
        lpos = cpos;
        temp = Number($(this).html());
    });

}
//在已存在的画布上画直线
function dochar(id, item, c_canvas, color) {
    //画链接线 上下
    var divcan = $(id);
    if (divcan[0]) {
        var can = document.getElementById(c_canvas);
        $(can).attr("style", "position:absolute;left:0;top:0;");
        can.width = divcan.width();
        can.height = divcan.height();
        var ctx = can.getContext('2d');

        ctx.strokeStyle = color;
        ctx.lineWidth = 1;
        var pos,
            spans = $(item, divcan),
            span = spans[0],
            sw = $(span).width() / 2,
            sh = $(span).height() / 2,
            lpos = null,
            cpos,
            npos,
            temp_val = 0;

        spans.each(function (i, span) {
            var el = $(span);
            var elval = el.html();
            pos = el.position();    // IE 下效率低
            cpos = {
                'left': [pos.left, pos.top + sh / 2],
                'right': [pos.left + sw, pos.top + sh / 2],
                'top': [pos.left + sw / 2, pos.top],
                'bottom': [pos.left + sw / 2, pos.top + sh]
            };
            if (lpos) {
                var l_x, l_y, c_x, c_y = 0;
                if (elval == temp_val) {
                    l_x = lpos.bottom[0];
                    l_y = lpos.bottom[1];
                    c_x = cpos.top[0];
                    c_y = cpos.top[1];
                } else if (elval > temp_val) {
                    //cpos = { 'x': pos.left + sw, 'y': pos.top + sh };
                    l_x = lpos.right[0];
                    l_y = lpos.right[1];
                    c_x = cpos.left[0];
                    c_y = cpos.left[1];
                } else {
                    //cpos = { 'x': pos.left + el.width(), 'y': pos.top + sh };
                    l_x = lpos.left[0];
                    l_y = lpos.left[1];
                    c_x = cpos.right[0];
                    c_y = cpos.right[1];
                }


                ctx.beginPath();
                //ctx.moveTo(lpos.x, lpos.y);
                //ctx.lineTo(cpos.x, cpos.y);
                ctx.moveTo(l_x, l_y);
                ctx.lineTo(c_x, c_y);

                ctx.closePath();
                ctx.stroke();
            }
            lpos = cpos;
            //npos = pos;
            temp_val = elval;
        });
    }
}

