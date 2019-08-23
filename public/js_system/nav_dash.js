$(document).ready(function() {;
    $('[data-toggle="offcanvas"]').click(function() {
        $('#wrapper').toggleClass('toggled');
        var table = $('.datatable').DataTable();
        table.columns.adjust().draw();
    });
});
$(window).resize(function() {
    //$('#wrapper').removeClass('toggled');
});
$(window).load(function() {
    const routes = [{
        path: '/logout',
        beforeEnter() { location.href = URLPRINCIPAL + 'Login/destroy_session' },
    }, {
        path: '/inicio',
        beforeEnter() { location.href = URLPRINCIPAL + 'Cpanel/Home' },
    }, {
        path: '/clientesgeneral',
        beforeEnter() { location.href = URLPRINCIPAL + 'Cpanel/ClientesGeneral' },
    }, {
        path: '/misclientes',
        beforeEnter() { location.href = URLPRINCIPAL + 'Cpanel/MisClientes' },
    }, ]
    const router = new VueRouter({
        routes // short for `routes: routes`
    })
    const app = new Vue({
        el: '#wrapper',
        router
    })
});