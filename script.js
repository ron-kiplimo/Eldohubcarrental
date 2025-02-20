document.addEventListener('DOMContentLoaded', () => {
    const vehicleContainer = document.getElementById('vehicle-container');

    // Mock vehicle data
    /*const vehicles = [
        { make: 'Toyota', model: 'Corolla', year: 2021, price: 50 },
        { make: 'Nissan', model: 'Altima', year: 2022, price: 60 },
        { make: 'Toyota', model: 'Corolla', year: 2021, price: 50 },
        { make: 'Nissan', model: 'Altima', year: 2022, price: 60 },
        { make: 'Toyota', model: 'Corolla', year: 2021, price: 50 },
        { make: 'Nissan', model: 'Altima', year: 2022, price: 60 },
        { make: 'Toyota', model: 'Corolla', year: 2021, price: 50 },
        { make: 'Nissan', model: 'Altima', year: 2022, price: 60 },
        { make: 'Toyota', model: 'Corolla', year: 2021, price: 50 },
        { make: 'Nissan', model: 'Altima', year: 2022, price: 60 },
    ]; */

    // Render vehicle listings
    vehicles.forEach(vehicle => {
        const div = document.createElement('div');
        div.innerHTML = `
            <h3>${vehicle.make} ${vehicle.model}</h3>
            <p>Year: ${vehicle.year}</p>
            <p>Price: $${vehicle.price}/day</p>
            <button>Book Now</button>
        `;
        vehicleContainer.appendChild(div);
    });

    // Owner form submission
    document.getElementById('owner-form').addEventListener('submit', e => {
        e.preventDefault();
        alert('Your car has been listed!');
    });
});
document.addEventListener('DOMContentLoaded', () => {
    const bookNowButtons = document.querySelectorAll('.book-now');
    const modal = document.getElementById('booking-modal');
    const closeButton = document.querySelector('.close-button');
    const vehicleNameInput = document.getElementById('vehicle-name');

    // Open modal
    bookNowButtons.forEach(button => {
        button.addEventListener('click', () => {
            vehicleNameInput.value = button.getAttribute('data-vehicle');
            modal.style.display = 'flex';
        });
    });

    // Close modal
    closeButton.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Close modal when clicking outside
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});

