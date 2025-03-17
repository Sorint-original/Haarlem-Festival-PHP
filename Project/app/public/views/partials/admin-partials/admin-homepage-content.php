<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page Editor</title>
</head>
<body>
    <div class="container">
        <h1>Homepage Editor</h1>
        <div class="save-indicator" id="saveIndicator">Değişiklikler kaydediliyor...</div>
        
        <!-- Info Cards Section -->
        <div class="section" id="infoCardsSection">
            <h2>Information Cards</h2>
            
            <div class="card">
                <h3>First Card</h3>
                <label for="firstCardTitle">Title:</label>
                <div id="firstCardTitle" class="editable-field" contenteditable="true"></div>
                
                <label for="firstCardContent">Content:</label>
                <div id="firstCardContent" class="editable-content" contenteditable="true"></div>
            </div>
            
            <div class="card">
                <h3>Second Card</h3>
                <label for="secondCardTitle">Title:</label>
                <div id="secondCardTitle" class="editable-field" contenteditable="true"></div>
                
                <label for="secondCardContent">Content:</label>
                <div id="secondCardContent" class="editable-content" contenteditable="true"></div>
            </div>
            
            <div class="card">
                <h3>Third Card</h3>
                <label for="thirdCardTitle">Title:</label>
                <div id="thirdCardTitle" class="editable-field" contenteditable="true"></div>
                
                <label for="thirdCardContent">Content:</label>
                <div id="thirdCardContent" class="editable-content" contenteditable="true"></div>
            </div>
        </div>
        
        <!-- FAQ Section -->
        <div class="section" id="faqSection">
            <h2>Frequently Asked Questions</h2>
            
            <div class="faq-item">
                <h3>First FAQ</h3>
                <label for="firstFaqQuestion">Question:</label>
                <div id="firstFaqQuestion" class="editable-field" contenteditable="true"></div>
                
                <label for="firstFaqAnswer">Answer:</label>
                <div id="firstFaqAnswer" class="editable-content" contenteditable="true"></div>
            </div>
            
            <div class="faq-item">
                <h3>Second FAQ</h3>
                <label for="secondFaqQuestion">Question:</label>
                <div id="secondFaqQuestion" class="editable-field" contenteditable="true"></div>
                
                <label for="secondFaqAnswer">Answer:</label>
                <div id="secondFaqAnswer" class="editable-content" contenteditable="true"></div>
            </div>
            
            <div class="faq-item">
                <h3>Third FAQ</h3>
                <label for="thirdFaqQuestion">Question:</label>
                <div id="thirdFaqQuestion" class="editable-field" contenteditable="true"></div>
                
                <label for="thirdFaqAnswer">Answer:</label>
                <div id="thirdFaqAnswer" class="editable-content" contenteditable="true"></div>
            </div>
            
            <div class="faq-item">
                <h3>Fourth FAQ</h3>
                <label for="fourthFaqQuestion">Question:</label>
                <div id="fourthFaqQuestion" class="editable-field" contenteditable="true"></div>
                
                <label for="fourthFaqAnswer">Answer:</label>
                <div id="fourthFaqAnswer" class="editable-content" contenteditable="true"></div>
            </div>
            
            <div class="faq-item">
                <h3>Fifth FAQ</h3>
                <label for="fifthFaqQuestion">Question:</label>
                <div id="fifthFaqQuestion" class="editable-field" contenteditable="true"></div>
                
                <label for="fifthFaqAnswer">Answer:</label>
                <div id="fifthFaqAnswer" class="editable-content" contenteditable="true"></div>
            </div>
        </div>
        
        <div id="responseMessage" class="response" style="display: none;"></div>
    </div>
    <script src="/assets/js/Admin/Admin-Homepage.js"></script>
</body>
</html>
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