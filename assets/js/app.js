const URL = window.location.href;
let filter_deal = document.getElementById('deal_id');
let filter_client = document.getElementById('client_id');

filter_deal.addEventListener('change', function (value) {
    if (!filter_deal.value) {
        filter_deal.value = "N";
    }
    document.location.href = URL + '&filter_deal=' + filter_deal.value;
})

filter_client.addEventListener('change', function (value) {
    if (!filter_client.value) {
        filter_client.value = "N";
    }
    document.location.href = URL + '&filter_client=' + filter_client.value;
})