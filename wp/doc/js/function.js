String.prototype.format = function()
{
    var args = arguments ;

    return this.replace(/{(\d+)}/g, function(match, number)
    {
        return typeof (args[number] != 'undefined') ? args[number] : match ;
    }) ;
};

var LinkToHtml = function (objLink)
{
    return objLink.Url ? '<a href={0}>{1}</a>'.format(objLink.Url, objLink.Text) : objLink.Text ;
}

var _getCss = function(_src)
{
    $('<link>')
        .attr(
        {
              type: 'text/css'
            , rel: 'stylesheet'
            , href: _src
        })
        .appendTo('head') ;
}