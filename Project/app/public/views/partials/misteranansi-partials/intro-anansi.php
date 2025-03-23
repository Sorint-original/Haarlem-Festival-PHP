<section class="intro-anansi">
    <div class="anansi-container">
        <h2 id="anansiTitle">Loading data</h2>
        
        <div class="row">
            <!-- 1. Satır -->
            <div class="row-item">
                <img src="/assets/images/MisterAnansi_First.png" alt="A story">
                <p id="anansiDescription">
                Loading data</p>
            </div>

            <!-- 2. Satır -->
            <div class="row-item">
                <img src="/assets/images/anansi_second.png" alt="Another story">
                <div class="text-container">
                <p id="anansiInfo">
                Loading data
             </p>
                <p id="anansiDetailed">
                Loading data
             </p>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="/assets/js/MisterAnansi.js"></script>
<style> 
    .intro-anansi h2 {
        margin-top: 30px;
        text-align: center;
        color: white;
        padding-bottom: 100px;
        padding-top: 20px;
    }

    .row {
        display: flex;
        flex-direction: column;
        gap: 30px;
        align-items: center;
    }

    .row-item {
        display: flex;
        align-items: center;
        gap: 20px;
        width: 85%;
    }

    .row-item img {
        width: 600px;
        height: auto;
        margin-left: 30px;
    }

    .row-item p {
        flex: 1;
        font-size: 26px;
        color: white;
    }
</style>
