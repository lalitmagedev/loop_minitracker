# Loop Mini Tracker
First of all, install the module in Magento 2.4.x.

### Check Tracking Info
* Add a product to the cart
* Check "loop_minitracker" table in the database.
* A tracking info for that product will be saved.

### Call API to get the tracking info
* Hit the API on the POSTMAN <Magento_url>/rest/V1/tracking
* You will get the response fetched from the Database
