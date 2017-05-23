var app = {
    activePage: 1,
    nextProducts: null,
    showNextProducts: false,
    getProducts: function() {
        app.activePage++;
        $.get('/list.php?page=' + app.activePage, function(res) {
            $('#preloader').hide();
            try{
                app.nextProducts = JSON.parse(res);
                if(app.nextProducts && app.nextProducts.entities.length){
                    app.renderNextProducts(app.nextProducts.entities);
                }
                console.log(app.nextProducts);
            }catch(e){
                console.error('Ошибка обработки данных!', e);
            }
        });
    },
    renderNextProducts: function(productsArr) {
        var html = '';
        productsArr.forEach(function(p) {
            html += ''+
            '<li class="product hide">'+
            '	<div class="innerProductBox">'+
            '		<div class="imgBox">'+
            '			<img src="' + p.img + '" alt="' + p.title + '">'+
            '            ' + (p.discountCost ? '<div class="label sale">Sale</div>' : '') +
            '            ' + (p.new ? '<div class="label new">New</div>' : '') +
            '		</div>'+
            '		<div class="title">' + p.title + '</div>'+
            '		<div class="description">' + p.description + '</div>'+
            '		<div class="costBox">'+
            '			<span class="cost">$' + p.cost + '</span>'+
            '			<span class="discountCost">' + (p.discountCost ? ('$' + p.discountCost) : '') + '</span>'+
            '		</div>'+
            '		<div class="btnBox">'+
            '			<button class="addToCart">add to cart</button>'+
            '			<button class="view">view</button>'+
            '		</div>'+
            '	</div>'+
            '</li>';
        });
        $(html).appendTo('.productBox');
        if(app.showNextProducts) {
            app.showNextProducts = false;
            setTimeout(app.showHiddenProduct , 200);
        }
    },
    showHiddenProduct: function() {
        $('.productBox .product.hide').removeClass('hide');
    },
    init: function() {
        $(document).ready(function() {
            app.getProducts();
        });
        $('.more').on('click', function() {
            app.showHiddenProduct();
            if(app.nextProducts == null){
                $('#preloader').show();
                app.showNextProducts = true;
                app.getProducts();
            }else if($('.productBox .product').length >= app.nextProducts.total){
                $('button.more').hide();
            } else{
                app.getProducts();
            }
        });
    }
};
app.init();

