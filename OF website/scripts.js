Document.getElementById('contact-form').addEventListener('submit', function(event) {
    Event.preventDefault();
    Alert('Thank you for your message. We will get back to you soon!');
    // Additional form submission logic goes here
});




/*about us*/
/*donate*/
Document.addEventListener('DOMContentLoaded', function() {
    Var stripe = Stripe('your-publishable-key-here');
    Var elements = stripe.elements();
    
    Var card = elements.create('card', {
        Style: {
            Base: {
                Color: '#32325d',
                fontFamily: 'Arial, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    Color: '#32325d'
                }
            },
            Invalid: {
                Color: '#fa755a',
                iconColor: '#fa755a'
            }
        }
    });
    
    Card.mount('#card-element');
    
    Card.addEventListener('change', function(event) {
        Var displayError = document.getElementById('card-errors');
        If (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    
    Var form = document.getElementById('donation-form');
    Form.addEventListener('submit', function(event) {
        Event.preventDefault();
        
        Stripe.createToken(card).then(function(result) {
            If (result.error) {
                Var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server
                stripeTokenHandler(result.token);
            }
        });
    });
    
    Function stripeTokenHandler(token) {
        Var form = document.getElementById('donation-form');
        Var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        
        form.submit();
    }
});





/*benReg*/
/*contact us*/
/*news*/
/*news*/
/*FAQ*/