<div class="container">
    <h1>Jazz Page Editor</h1>
    <div class="save-indicator" id="saveIndicator">Değişiklikler kaydediliyor...</div>
    
    <!-- Info Cards Section -->
    <div class="section" id="infoPageSection">
        
        <div class="card">
            <label for="pageHeader">Header:</label>
            <div id="pageHeader" class="editable-field" contenteditable="true"></div>
            
            <label for="pageText">Text:</label>
            <div id="pageText" class="editable-content" contenteditable="true"></div>
        </div>

        <div id="responseMessage" class="response" style="display: none;"></div>
    </div>
</div>

<script src="/assets/js/Admin/Admin-Jazz.js"></script>

<style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            margin-bottom: 20px;
        }
        h2 {
            margin-top: 30px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .section {
            margin-bottom: 40px;
        }
        .card, .faq-item {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .editable-field {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            min-height: 20px;
        }
        .editable-content {
            min-height: 100px;
            resize: vertical;
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #f9f9f9;
        }
        .response {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .loading {
            display: none;
            text-align: center;
            margin: 20px 0;
        }
        .editable-field:focus, .editable-content:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }
        .save-indicator {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            display: none;
            z-index: 1000;
        }
    </style>