# supplier-data-graphql
Create a module. We want to keep a list of supplier contacts in the admin. And we want
products to have a supplier attribute with supplier names. The list of suppliers contacts and
supplier attribute for a product doesn’t have to be linked.
Module name: Supplier. The module should:
a. Automatically create a new product attribute (dropdown attribute) called ‘Supplier’
(attribute code: supplier). There needs to be 3 attribute values to that attribute: Supp A,
Supp B, Supp C. This attribute & attribute values should be created programmatically
and not manually via admin.
b. Assign this attribute to the Default attribute set. This should happen programmatically.
c. Create a ‘Supplier’ entity (like ‘Customer’ entity), which will contain 3 details: name,
email, phone. Ok to use simple textarea input for these. This is not linked to the prdouct
attribute.
d. Add ‘Supplier’ in the admin left menu, below ‘Customer’, with only 1 sub-menu option
called ‘Manage Suppliers’.
e. Clicking on the ‘Manage Suppliers’ should take you to a ‘supplier’ entity grid containing
the list of suppliers, similar to how you see list of customers when you go to Customers >
All customers.
f. You should be able to add / delete suppliers from the grid page, like how you can
manage customers.
g. This supplier list should be made available via GraphQL.
