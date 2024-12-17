# SmartObras

SmartObras is a web platform that connects clients with professional freelancers in the construction industry. It specializes in services such as tiling, electrical work, and plumbing. The platform allows users to post jobs, find work, and communicate seamlessly.

## Features

- **Job Posting**: Clients can create job listings with detailed descriptions and budgets.
- **Job Search**: Professionals can browse and filter job listings based on service type and other criteria.
- **User Profiles**: Both clients and professionals have profiles to showcase their information and work history.
- **Messaging System**: Built-in chat for direct communication between clients and professionals.
- **Proposal Management**: Professionals can submit proposals, and clients can accept offers.

## Installation

### Prerequisites

- PHP 7.x or higher
- MySQL or MariaDB
- Web server (e.g., Apache or Nginx)
- Composer (if dependencies are managed via Composer)

### Steps

1. **Clone the Repository**

    ```bash
    git clone https://github.com/yourusername/SmartObras.git
    ```

2. **Database Setup**

    - Create a new MySQL database.
    - Import the provided SQL script to set up necessary tables.

3. **Configuration**

    - Navigate to the `api` directory.
    - Create a file named `config.env` with the following content:

      ```php
      <?php
         $server = "your_server_url";
         $db = "your_database_name";
         $user = "your_database_user";
         $passw = "your_database_password";
      ?>
      ```

4. **Dependencies**

    - If using Composer, run:

      ```bash
      composer install
      ```

5. **Web Server Configuration**

    - Set up your web server to point to the project directory.
    - Ensure correct permissions for web server access.

6. **Run the Application**

    - Access the application through your web browser.

## Usage

- **For Clients**

  - Register as a client.
  - Create job listings by providing details like title, description, service type, and budget.
  - Review proposals from professionals and accept suitable offers.

- **For Professionals**

  - Register as a professional.
  - Browse available jobs and use filters to find suitable listings.
  - Submit proposals and communicate with clients via the messaging system.

## Contributing

Contributions are welcome. Please open an issue or submit a pull request for any improvements.

## License

This project is licensed under the GNU GPLv3 License.
