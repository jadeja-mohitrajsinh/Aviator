Here's the revised README with the additional information about installing Composer and Firebase:

---

# Aviator: Elevating Luxury Private Jets Sales

Welcome to Aviator, a platform dedicated to transforming the luxury private jets market. Aviator provides a secure and intuitive space for buyers and sellers to connect, facilitating the purchase and sale of high-end private jets. Our platform empowers sellers to showcase their aircraft and enables buyers to discover their dream jets with ease and confidence.

## About Aviator

Aviator is designed to revolutionize the luxury private jets market by offering a sophisticated platform that caters to the needs of both buyers and sellers. Our goal is to streamline the process of buying and selling private jets, making it efficient, and transparent.

## Getting Started

To get started with Aviator, follow these simple steps:

### Installation:

Sure, here's a step-by-step guide with scripts and explanations:

1. **Clone this repository to your local machine:**
   ```
   git clone https://github.com/king-mohitrajsinh/Aviator
   ```
   Replace `<repository_url>` with the URL of your repository.

   Explanation: This command clones the repository from the specified URL to your local machine.

2. **Ensure you have PHP installed on your system:**
   You can check if PHP is installed by running:
   ```
   php -v
   ```
   If PHP is installed, you'll see its version information.

   Explanation: This command checks if PHP is installed on your system.

3. **Set up Composer:**
   If you haven't installed Composer yet, you can download and install it from [https://getcomposer.org/download/](https://getcomposer.org/download/).

   Explanation: Composer is a dependency manager for PHP, which you'll need to manage the dependencies of your project.

4. **Install Firebase PHP SDK using Composer:**
   After installing Composer, navigate to your project directory in the terminal and run the following command:
   ```
   composer require kreait/firebase-php
   ```

   Explanation: This command installs the Firebase PHP SDK into your project using Composer, allowing you to interact with Firebase services from your PHP code.

5. **Set up a Firebase project and Firestore database:**
   Go to the Firebase Console ([https://console.firebase.google.com/](https://console.firebase.google.com/)) and create a new project. Follow the prompts to set up a Firestore database within your project.

   Explanation: This step creates a new Firebase project and sets up a Firestore database, which will be used to store your data.

6. **Copy the necessary Firebase credentials to your project:**
   After setting up your Firebase project, navigate to the project settings and download the service account credentials file (usually named `firebase-adminsdk.json`). Copy this file to your project directory.

   Explanation: This file contains the necessary credentials for your PHP application to authenticate with Firebase.

7. **Visit the Kreait/Firebase PHP SDK GitHub page:**
   Visit the GitHub page of Kreait/Firebase PHP SDK: [https://github.com/kreait/firebase-php](https://github.com/kreait/firebase-php). Follow the installation instructions provided there to download the SDK.

   Explanation: Kreait/Firebase PHP SDK is a PHP package that allows you to interact with Firebase services from your PHP code.

8. **Once the SDK is downloaded and included in your project, configure it with your Firebase credentials:**
   In your PHP code, include the Firebase PHP SDK and configure it with the service account credentials you copied earlier.

   ```php
   <?php
   require 'vendor/autoload.php';

   use Kreait\Firebase\Factory;
   use Kreait\Firebase\ServiceAccount;

   $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/path/to/firebase-adminsdk.json');

   $firebase = (new Factory)
       ->withServiceAccount($serviceAccount)
       ->create();

   $database = $firebase->getDatabase();

   // Now you can use $database to interact with Firestore
   ?>
   ```
   Replace `/path/to/firebase-adminsdk.json` with the path to your Firebase service account credentials file.

   Explanation: This PHP script sets up the Firebase PHP SDK with your service account credentials, allowing you to interact with Firebase services, such as Firestore, from your PHP code.

You can save this PHP script in a file (e.g., `firebase_setup.php`) and run it to configure your Firebase credentials in your project. Make sure to replace placeholders with your actual values.

### Running the App:

If you're using XAMPP, you can simply access your PHP files through the `htdocs` directory without specifying a port. Here's how you can do it:

1. **Start XAMPP:**
   Open XAMPP Control Panel and start the Apache server.

2. **Navigate to your project directory:**
   Place your PHP files in the `htdocs` directory of your XAMPP installation. Typically, the path is `C:\xampp\htdocs` on Windows or `/Applications/XAMPP/htdocs` on macOS.

3. **Access your application:**
   Open a web browser and navigate to `http://localhost/<dirname>`, where `<dirname>` is the name of the directory containing your PHP files.

   For example, if your project directory is named `myproject`, you would navigate to:
   ```
   http://localhost/Aviator
   ```

   Explanation: This URL accesses your PHP application running on the Apache server through the localhost address without specifying a port. The files in the specified directory will be served by Apache.

By following these steps, you can access your PHP application on localhost without the need to specify a port when using XAMPP. Make sure to replace `<dirname>` with the name of your project directory.

## How to Use

Once Aviator is deployed, follow these steps to start exploring luxury private jets:

1. **Browse Listings:** Explore a diverse range of luxury private jets listed on Aviator. Filter listings based on your preferences to find the perfect jet.

2. **Discover Jets:** Dive into detailed listings to learn more about each private jet. View images, specifications, and pricing information to make informed decisions.

3. **Connect with Sellers:** Use Aviator's built-in communication features to connect with sellers directly. Discuss details, negotiate prices, and finalize transactions with ease.

4. **Stay Updated:**  Keep track of your favorite listings and receive notifications about new arrivals or price changes.

If you'd like to contribute to Aviator, fork the project on GitHub and submit a pull request. We welcome ideas and collaborations to make Aviator the ultimate destination for luxury private jet enthusiasts.

## License

Aviator is licensed under the MIT license. See [LICENSE](LICENSE) for more information.

---
