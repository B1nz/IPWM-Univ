let type = "BillingStatements";
let echo = (type == "BillingStatement") ? "Billing" : type == "AccountStatemnt" ? "Installments" : "Unknown";
console.log(echo);
