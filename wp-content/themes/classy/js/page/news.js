import axios from 'axios';
import Blazy from 'blazy';

const content = document.getElementById('pageContent');
const tagsForm = document.getElementById('tagsForm');
const newsTags = document.querySelectorAll('.news-tags .news-tag');
const showMore = document.getElementById('showMore');
const showLess = document.getElementById('showLess');


function getPosts(url, data, callback) {
    axios
        .post(url, data)
        .then(response => {
            callback(response);
        });
}

function initPagination() {
    const pagination = document.querySelectorAll('.nav-links a');

    if (pagination.length) {
        pagination.forEach(function (element) {
            element.addEventListener('click', function (event) {
                event.preventDefault();

                let url = new URL(event.target.href);
                let current_page = url.searchParams.get("page");
                if (current_page == null) current_page = 1;

                const formData = tagsForm !== null ? new FormData(tagsForm) : new FormData();

                formData.append('action', 'get_news_by_tag');
                formData.append('page_id', frontend_ajax_object.page_id);
                formData.append('current_page', current_page);

                getPosts(frontend_ajax_object.ajaxurl, formData, function (response) {
                    content.innerHTML = response.data;
                    new Blazy();
                    initPagination();
                });
            });
        });
    }
}

if (showMore !== null) {
    showMore.addEventListener('click', function (event) {
        newsTags.forEach(function (tag) {
            if (tag.classList.contains('hidden')) {
                tag.classList.remove('hidden');
            }
        });
        this.classList.add('hidden');
        showLess.classList.remove('hidden');
    });
}

if (showLess !== null) {
    showLess.addEventListener('click', function (event) {
        newsTags.forEach(function (tag, index) {
            if (index > 5) {
                tag.classList.add('hidden');
            }
        });
        this.classList.add('hidden');
        showMore.classList.remove('hidden');
    })
}


if (tagsForm !== null) {
    tagsForm.addEventListener('submit', function (event) {
        event.preventDefault();
    });
}

if (newsTags.length) {
    newsTags.forEach(function (tag) {

        const input = tag.querySelector('input');

        input.addEventListener('change', function () {

            const formData = tagsForm !== null ? new FormData(tagsForm) : new FormData();

            formData.append('action', 'get_news_by_tag');
            formData.append('page_id', frontend_ajax_object.page_id);

            getPosts(frontend_ajax_object.ajaxurl, formData, function (response) {
                content.innerHTML = response.data;
                new Blazy();
                initPagination();
            });
        });
    });
}

initPagination();

