var stripe = Stripe('YOUR_PUBLISHABLE_KEY');
  var elements = stripe.elements();
  
  var cardElement = elements.create('card');
  cardElement.mount('#card-element');
  
  var form = document.getElementById('payment-form');
  
  form.addEventListener('submit', function(event) {
    event.preventDefault();
    
    stripe.createToken(cardElement).then(function(result) {
      if (result.error) {
        // Inform the user if there was an error
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Send the token to your server
        stripeTokenHandler(result.token);
      }
    });
  });
  
  function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    
    // Submit the form
    form.submit();
  }
