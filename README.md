Shoe Showcasing Website
Welcome to the Shoe Showcasing Website project! This web application allows users to browse and manage a variety of shoe products, with functionalities for both customers and admins.

Features
Customer Side
Login and Register: Create and manage user accounts.
Browse Categories: View all available shoe categories.
View Products: Browse products within categories.
Product Filtering: Filter products by brands and price.
Product Details: View detailed information and images for each product.
Color Selection: Choose a color variant for products before adding to the cart.
Quantity Adjustment: Adjust the quantity of products before adding them to the cart.
Add to Cart: Add selected products to the shopping cart.
Add to Wishlist: Save products to a wishlist for future reference.
Cart Management: View and manage items in the cart.
Wishlist Management: View and manage wishlist items.
Checkout Process: Complete purchases through a checkout page.
Form Validation: Ensure checkout form is filled out correctly before placing an order.
Payment Options: Pay via Paypal or Cash on Delivery (COD).
Order Notifications: Receive email notifications upon order placement.
Order History: View past orders and their details.
User Profile: Manage and update user profile.
Change Password: Update account password.
Admin Side
Category Management: Create, read, update, and delete (CRUD) categories.
Product Management:
Add, edit, update, and delete products.
Add multiple images and colors for each product.
Brand Management: CRUD operations for brands associated with products.
Color Management: CRUD operations for colors linked with products.
Slider Management: Manage homepage sliders.
Site Settings:
Update basic website details.
Manage social media links and contact/office information displayed on the frontend.
User Management: CRUD operations with roles for managing users.
Order Management:
View and filter orders by date and status.
View detailed order and user information.
Manage invoices: view, download as PDF, and email invoices.
Update order status (e.g., In-Progress, Completed, Pending, Cancelled).
Dashboard Statistics:
Overview of total, daily, monthly, and yearly orders.
Statistics on products and users.
Technologies Used
Laravel: PHP framework for backend development.
Livewire: Dynamic components for real-time updates.
Bootstrap: CSS framework for responsive design.

Installation
Clone the repository


Copy code
git clone https://github.com/yourusername/shoe-showcasing-website.git
Navigate to the project directory

Copy code
cd shoe-showcasing-website
Install the dependencies

Copy code
composer install
Set up your environment file

Copy the .env.example file to .env and configure your environment variables.

Copy code
cp .env.example .env
Generate an application key

Copy code
php artisan key:generate
Run migrations and seed the database

Copy code
php artisan migrate --seed
Start the development server

Copy code
php artisan serve
The application will be accessible at http://localhost:8000.

Contributing
To contribute:

Fork the repository.
Create a new branch for your changes.
Commit your changes and push to your fork.
Open a pull request.
License
This project is licensed under the MIT License. See the LICENSE file for details.

Contact
For questions or feedback, contact niel2264@gmail.com.

