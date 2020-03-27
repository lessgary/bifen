
//jquery.cookie.js是一个基于jquery的插件，点击下载！

//创建一个会话cookie：

//$.cookie(‘cookieName’,'cookieValue’);

//注：当没有指明cookie时间时，所创建的cookie有效期默认到用户浏览器关闭止，故被称为会话cookie。

//创建一个持久cookie：

//$.cookie(‘cookieName’,'cookieValue’，｛expires：7｝);

//注：当指明时间时，故称为持久cookie，并且有效时间为天。

//创建一个持久并带有效路径的cookie：

//$.cookie(‘cookieName’,'cookieValue’，｛expires：7，path：’/'｝);

//注：如果不设置有效路径，在默认情况下，只能在cookie设置当前页面读取该cookie，cookie的路径用于设置能够读取cookie的顶级目录。

//创建一个持久并带有效路径和域名的cookie：

//$.cookie(‘cookieName’,'cookieValue’，｛expires：7，path：’/'，domain: ‘chuhoo.com’，secure: false，raw:false｝);

//注：domain：创建cookie所在网页所拥有的域名；secure：默认是false，如果为true，cookie的传输协议需为https；raw：默认为false，读取和写入时候自动进行编码和解码（使用encodeURIComponent编码，使用decodeURIComponent解码），关闭这个功能，请设置为true。

//获取cookie：

//$.cookie(‘cookieName’);   //如果存在则返回cookieValue，否则返回null。

//删除cookie：

//$.cookie(‘cookieName’,null);

//注：如果想删除一个带有效路径的cookie，如下：$.cookie(‘cookieName’,null,{path:’/'});
jQuery.cookie = function (name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};