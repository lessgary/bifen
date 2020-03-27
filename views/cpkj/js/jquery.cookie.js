
//jquery.cookie.js��һ������jquery�Ĳ������������أ�

//����һ���Ựcookie��

//$.cookie(��cookieName��,'cookieValue��);

//ע����û��ָ��cookieʱ��ʱ����������cookie��Ч��Ĭ�ϵ��û��������ر�ֹ���ʱ���Ϊ�Ựcookie��

//����һ���־�cookie��

//$.cookie(��cookieName��,'cookieValue������expires��7��);

//ע����ָ��ʱ��ʱ���ʳ�Ϊ�־�cookie��������Чʱ��Ϊ�졣

//����һ���־ò�����Ч·����cookie��

//$.cookie(��cookieName��,'cookieValue������expires��7��path����/'��);

//ע��������������Ч·������Ĭ�������£�ֻ����cookie���õ�ǰҳ����ȡ��cookie��cookie��·�����������ܹ���ȡcookie�Ķ���Ŀ¼��

//����һ���־ò�����Ч·����������cookie��

//$.cookie(��cookieName��,'cookieValue������expires��7��path����/'��domain: ��chuhoo.com����secure: false��raw:false��);

//ע��domain������cookie������ҳ��ӵ�е�������secure��Ĭ����false������Ϊtrue��cookie�Ĵ���Э����Ϊhttps��raw��Ĭ��Ϊfalse����ȡ��д��ʱ���Զ����б����ͽ��루ʹ��encodeURIComponent���룬ʹ��decodeURIComponent���룩���ر��������ܣ�������Ϊtrue��

//��ȡcookie��

//$.cookie(��cookieName��);   //���������򷵻�cookieValue�����򷵻�null��

//ɾ��cookie��

//$.cookie(��cookieName��,null);

//ע��������ɾ��һ������Ч·����cookie�����£�$.cookie(��cookieName��,null,{path:��/'});
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