
    document.addEventListener('DOMContentLoaded', function() {
        fetch('fetch_top_seller.php') // Adjust the path if necessary
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                const topSellerElement = document.getElementById('top-seller');
                const salesAmountElement = document.getElementById('sales-amount');

                if (data.owner_id !== null) {
                    topSellerElement.innerHTML = data.username; // Correctly reference username
                    salesAmountElement.innerHTML = `Total Sales: ₱${data.total_sales_amount.toFixed(2)}`; // Correct total_sales_amount reference
                } else {
                    topSellerElement.innerHTML = 'No sellers found';
                    salesAmountElement.innerHTML = '';
                }
            })
            .catch(error => console.error('Error fetching top seller:', error));
    });

    document.addEventListener('DOMContentLoaded', function() {
        fetch('fetch_total_sales.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                const totalSalesElement = document.getElementById('total-sales');
                if (data.total_sales !== undefined) {
                    totalSalesElement.innerHTML = `₱${data.total_sales.toFixed(2)}<sub class="text-muted f-14">PHP</sub>`;
                } else {
                    console.error('Unexpected data format:', data);
                }
            })
            .catch(error => console.error('Error fetching total sales:', error));
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Fetch visitor count
        fetch('fetch_visitor_count.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                const visitorCountElement = document.getElementById('visitor-count');
                if (data.total_visitors !== undefined) {
                    visitorCountElement.innerHTML = `${data.total_visitors}<sub class="text-muted f-14">Visitors</sub>`;
                } else {
                    console.error('Unexpected data format:', data);
                }
            })
            .catch(error => console.error('Error fetching visitor count:', error));

        // Fetch user count (assuming fetch_recent_users.php is correct)
        fetch('fetch_recent_users.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                const userCountElement = document.getElementById('user-count');
                if (data.total_users !== undefined) {
                    userCountElement.innerHTML = `${data.total_users}<sub class="text-muted f-14">Users</sub>`;
                } else {
                    console.error('Unexpected data format:', data);
                }
            })
            .catch(error => console.error('Error fetching user count:', error));

        // Fetch total clicks (assuming fetch_click.php is correct)
        fetch('fetch_click.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('total-clicks').innerHTML = 'Total Clicks: ' + data.total_clicks;
            })
            .catch(error => console.error('Error fetching total clicks:', error));
    });


                            // Function to fetch sales data
                            function fetchSalesData() {
                                $('#loading').show(); // Show loading indicator

                                $.ajax({
                                    url: '../view/phinry/fetch_sales_date.php', // Path to your sales data script
                                    method: 'GET',
                                    dataType: 'json',
                                    success: function(salesData) {
                                        if (salesData.error) {
                                            $('#error-message').text(salesData.error);
                                            return;
                                        }

                                        // Initialize Morris chart
                                        new Morris.Line({
                                            element: 'morris-line-chart',
                                            data: salesData,
                                            xkey: 'date',
                                            ykeys: ['daily', 'monthly', 'yearly'],
                                            labels: ['Daily Sales', 'Monthly Sales', 'Yearly Sales'],
                                            hideHover: 'auto',
                                            resize: true
                                        });
                                    },
                                    error: function(err) {
                                        $('#error-message').text('Error fetching sales data');
                                        console.error('Error fetching data', err);
                                    },
                                    complete: function() {
                                        $('#loading').hide(); // Hide loading indicator
                                    }
                                });
                            }

                            // Fetch user data and sales data
                            fetchUserData();
                            fetchSalesData();
                        });
    

    $(document).ready(function () {
        function fetchVisitorData() {
            $('#daily-visitor-chart').html('Loading...'); // Display "Loading..." text initially

            $.ajax({
                url: 'fetch_visitor_data.php', // Path to the PHP script
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data.error) {
                        console.error('Error fetching data:', data.error);
                        $('#daily-visitor-chart').html('Error loading data.');
                        return;
                    }

                    // Initialize Morris.js line chart
                    new Morris.Line({
                        element: 'daily-visitor-chart',
                        data: data,
                        xkey: 'date', // x-axis: date
                        ykeys: ['count'], // y-axis: visitor count
                        labels: ['Visitors'], // y-axis label
                        lineColors: ['#4caf50'], // Line color
                        xLabelAngle: 45, // Rotate x-axis labels for readability
                        parseTime: false // Ensure Morris.js does not parse the date as time
                    });
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', status, error);
                    $('#daily-visitor-chart').html('Error loading data.');
                }
            });
        }

        // Fetch and render visitor data
        fetchVisitorData();
    });
