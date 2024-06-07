<style>
    .e-card {
        margin: 100px auto;
        background: transparent;
        position: relative;
        width: 100%;
        height: auto;
        overflow: hidden;
    }

    .wave {
        position: absolute;
        width: 100%;
        height: 70%;
        opacity: 0.8;
        margin-left: -50%;
        margin-top: -50%;
        background: linear-gradient(744deg, #af40ff, #5b42f3 60%, #00ddeb);
        border-radius: 40%;
        animation: wave 55s infinite linear;
    }

    .wave:nth-child(2) {
        top: 10%;
        animation-duration: 50s;
    }

    .wave:nth-child(3) {
        top: 20%;
        animation-duration: 45s;
    }

    .playing .wave {
        animation: wave 3000ms infinite linear;
    }

    .playing .wave:nth-child(2) {
        animation-duration: 4000ms;
    }

    .playing .wave:nth-child(3) {
        animation-duration: 5000ms;
    }

    @keyframes wave {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .info-section {
        padding: 20px;

        background-color: #009CFF;
        text-align: center;
        color: #000000;
    }

    .info-section p {
        margin: 0;
        padding: 0;
        font-size: 1.2rem;
    }

    .info-section p + p {
        margin-top: 10px;
    }

    .info-section .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #ca6702;
        color: #fff;
        font-size: 1rem;
        font-weight: bold;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .info-section .btn:hover {
        background-color: #007acc;
    }

    @media (max-width: 768px) {
        .info-section p {
            font-size: 1rem;
        }

        .info-section .btn {
            font-size: 0.875rem;
            padding: 8px 16px;
        }
    }
</style>

<div class="untree_co-section">

    <div class="e-card playing">
        <div class="image"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#009CFF" fill-opacity="1" d="M0,64L26.7,64C53.3,64,107,64,160,101.3C213.3,139,267,213,320,234.7C373.3,256,427,224,480,197.3C533.3,171,587,149,640,154.7C693.3,160,747,192,800,186.7C853.3,181,907,139,960,106.7C1013.3,75,1067,53,1120,80C1173.3,107,1227,181,1280,202.7C1333.3,224,1387,192,1413,176L1440,160L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path>
        </svg>
        <div class="info-section">
            <h2 class="mb-2 text-black">Lets you Explore the Best. Plan with Us Now</h2>
            <p>Choose the Plan that is suitable for you.</p>
            <p>We are so happy to save you.</p>
            <p>You can add or choose the Plan for your travel in Zanzibar.</p>
            <a href="{{route('view-bookingplan')}}" class="btn">Choose or Add Plan</a>
        </div>
    </div>
    </div>
</div>
