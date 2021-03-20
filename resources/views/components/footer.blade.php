<footer class="footer bg-dark text-white py-4">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4">
                <div class="d-block text-right">
                    <img class="mb-3"
                         src="{{ asset('assets/img/logo.png') }}"
                         style="height: 120px"
                         alt="">
                    <p>
                        مركز التدريب والاشراف التربوي
                        معتمد من وزراه التعليم
                        وكيل برنامج عقول  للحساب الذهني في الشرق الاوسط ، عضو الاكاديميه  الدوليه البريطانيه
                    </p>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <h5 class="has-line-white">روابط سريعة</h5>
                <div class="d-flex flex-column">
                    <a href="{{ route('workshops.all') }}">
                        الدورات
                    </a>
                    <a href="{{ route('contact') }}">
                        تواصل معنا
                    </a>
                    <a href="{{ route('about') }}">
                        عنا
                    </a>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <h5 class="has-line-white">تواصل معنا</h5>
                <div class="d-flex">
                    <a class="fb-link" href=""><span class="mdi mdi-facebook"></span></a>
                    <a class="whatsapp-link" href=""><span class="mdi mdi-whatsapp"></span></a>
                    <a class="twitter-link" href=""><span class="mdi mdi-twitter"></span></a>
                    <a class="snapchat-link" href=""><span class="mdi mdi-snapchat"></span></a>
                </div>
            </div>
        </div>
    </div>
</footer>
