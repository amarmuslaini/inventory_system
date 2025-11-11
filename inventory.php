<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inventory | InventSmart</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
body {
  margin: 0;
  font-family: 'Poppins', sans-serif;
  background: #f8f9fc;
}

/* ===== Navbar ===== */
.navbar {
  width: 97%;
  background: #2c2c2c;
  color: #fff;
  padding: 15px 40px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.navbar h1 {
  color: #ff9800;
  font-size: 28px;
}

.nav-links {
  display: flex;
  gap: 25px;
}

.nav-links a {
  color: #fff;
  text-decoration: none;
  font-weight: 500;
  font-size: 20px;
  transition: color 0.3s;
}

.nav-links a:hover {
  color: #ff9800;
}

/* ===== Profile ===== */
.profile-container {
  position: relative;
  display: flex;
  align-items: center;
}

.profile-pic {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  cursor: pointer;
  border: 2px solid #ff9800;
  object-fit: cover;
  transition: 0.3s;
}

.profile-pic:hover {
  transform: scale(1.05);
}

.profile-menu {
  position: absolute;
  top: 55px;
  right: 0;
  background: #2c2c2c;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.3);
  overflow: hidden;
  display: none;
  flex-direction: column;
  width: 160px;
  z-index: 1000;
}

.profile-menu a {
  display: block;
  color: #fff;
  text-decoration: none;
  padding: 10px 15px;
  font-size: 14px;
  transition: background 0.3s;
}

.profile-menu a:hover {
  background: #ff9800;
}

/* ===== Layout ===== */
.container {
  display: flex;
  height: calc(100vh - 80px);
  overflow: hidden;
}

/* Left panel */
.left-panel {
  width: 33%;
  border-right: 2px solid #ccc;
  overflow-y: auto;
  padding: 20px;
  background: #fff;
}

.search-filter {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-bottom: 20px;
}

.search-filter input, .search-filter select {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-family: 'Poppins';
  font-size: 14px;
  outline: none;
}

.search-filter input:focus, .search-filter select:focus {
  border-color: #ff9800;
}

.product-box {
  background: #f4f4f4;
  border-radius: 10px;
  padding: 15px;
  margin-bottom: 15px;
  cursor: pointer;
  transition: 0.3s;
}

.product-box:hover {
  background: #ff9800;
  color: #fff;
}

/* Right panel */
.right-panel {
  width: 67%;
  display: flex;
  flex-direction: column;
  height: 100%;
}

/* Top: Product details */
.product-details {
  flex: 2;
  padding: 30px;
  background: #fff;
  border-bottom: 2px solid #ccc;
  overflow-y: auto;
  position: relative;
}

.product-details table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
}

.product-details td {
  padding: 8px;
  border-bottom: 1px solid #ddd;
}

.product-details td:first-child {
  font-weight: 600;
  width: 180px;
}

.action-buttons {
  position: absolute;
  bottom: 20px;
  right: 30px;
  display: flex;
  gap: 10px;
}

.action-buttons button {
  padding: 8px 16px;
  border: none;
  border-radius: 8px;
  background: #ff9800;
  color: white;
  font-weight: 500;
  cursor: pointer;
  transition: 0.3s;
}

.action-buttons button:hover {
  background: #e68a00;
}

/* Bottom: Similar products */
.similar-products {
  flex: 1;
  padding: 20px;
  background: #f1f1f1;
  overflow-x: auto;
}

.similar-products h3 {
  margin-bottom: 10px;
  color: #333;
}

.similar-grid {
  display: flex;
  gap: 15px;
}

.similar-item {
  background: #fff;
  border-radius: 10px;
  padding: 10px;
  width: 180px;
  text-align: center;
  flex-shrink: 0;
}

.similar-item img {
  width: 100%;
  height: 100px;
  object-fit: cover;
  border-radius: 8px;
}

/* ===== Modal Styling ===== */
.modal {
  display: none;
  position: fixed;
  z-index: 2000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.5);
  justify-content: center;
  align-items: center;
}

.modal-content {
  background: #fff;
  padding: 25px;
  border-radius: 12px;
  width: 400px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.3);
  animation: fadeIn 0.3s ease;
}

.modal-content h3 {
  margin-top: 0;
  color: #ff9800;
}

.modal-content label {
  display: block;
  font-weight: 600;
  margin-top: 10px;
}

.modal-content input, 
.modal-content textarea {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-family: "Poppins", sans-serif;
}

.modal-buttons {
  margin-top: 15px;
  display: flex;
  justify-content: flex-end;
  gap: 10px;
}

.modal-buttons button {
  padding: 8px 15px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-weight: 600;
}

.modal-buttons button[type="submit"] {
  background: #ff9800;
  color: white;
}

.modal-buttons #cancelEdit {
  background: #ccc;
}

@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.9); }
  to { opacity: 1; transform: scale(1); }
}

.action-buttons {
  position: relative;
  bottom: 0;
  right: 0;
  display: flex;
  flex-wrap: wrap; /* ✅ allows wrapping on small screens or zoomed-in views */
  justify-content: space-between;
  align-items: center;
  gap: 10px;
  width: 100%;
  margin-top: 20px;
}

.status-boxes {
  display: flex;
  flex-wrap: wrap; /* ✅ wrap checkboxes nicely when zoomed */
  gap: 15px;
}

.status-boxes label {
  display: flex;
  align-items: center;
  font-size: 14px;
  gap: 5px;
  white-space: nowrap; /* prevents label text from breaking weirdly */
}

.action-buttons button {
  flex-shrink: 0;
}


</style>
</head>
<body>

<div class="navbar">
  <h1>InventSmart Inventory</h1>
  <div class="nav-links">
    <a href="dashboard.php">Dashboard</a>
    <a href="inventory.php">Inventory</a>
    <a href="reports.php">Reports</a>
    <a href="settings.php">Settings</a>
  </div>
  <div class="profile-container">
    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" 
         alt="Profile" class="profile-pic" id="profilePic">
    <div class="profile-menu" id="profileMenu">
      <a href="account_settings.php">Manage Account</a>
      <a href="logout.php">Logout</a>
    </div>
  </div>
</div>

<div class="container">
  <!-- Left panel -->
  <div class="left-panel">
    <div class="search-filter">
      <input type="text" id="searchInput" placeholder="Search by name or barcode...">
      <select id="categoryFilter">
  <option value="">All Categories</option>
  <?php foreach ($categories as $cat): ?>
    <option value="<?= htmlspecialchars($cat) ?>">
      <?= htmlspecialchars($categoryNames[$cat] ?? "Category $cat") ?>
    </option>
  <?php endforeach; ?>
</select>


    </div>
    

    

    <div id="productList">
      <?php foreach ($products as $product): ?>
        <div class="product-box"
             data-id="<?= htmlspecialchars($product['id']) ?>"
             data-category="<?= htmlspecialchars($product['food_category']) ?>"
             data-name="<?= htmlspecialchars($product['name']) ?>"
             data-price="<?= htmlspecialchars($product['price']) ?>"
             data-cost="<?= htmlspecialchars($product['cost']) ?>"
             data-barcode="<?= htmlspecialchars($product['barcode']) ?>"
             data-stocks="<?= htmlspecialchars($product['stocks']) ?>"
             data-rd="<?= htmlspecialchars($product['receive_date']) ?>"
             data-exp="<?= htmlspecialchars($product['expired_date']) ?>"
             data-supplier="<?= htmlspecialchars($product['supplier']) ?>">
          <h4><?= htmlspecialchars($product['name']) ?></h4>
          <p>Stock: <?= htmlspecialchars($product['stocks']) ?></p>
          <p>Price: RM<?= htmlspecialchars($product['price']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Right panel -->
  <div class="right-panel">
    <div class="product-details" id="productDetails">
      <h2>Select a product to view details</h2>
    </div>

    <div class="similar-products" id="similarProducts">
      <h3>Similar Products</h3>
      <div class="similar-grid" id="similarGrid"></div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="modal">
  <div class="modal-content">
    <h3>Edit Product</h3>
    <form id="editForm">
      <input type="hidden" name="id" id="edit_id">
      <label>Name:</label>
      <input type="text" name="name" id="edit_name" required>

      <label>Description:</label>
      <textarea name="description" id="edit_description" required></textarea>

      <label>Price (RM):</label>
      <input type="number" name="price" id="edit_price" step="0.01" required>

      <label>Image URL:</label>
      <input type="text" name="image_url" id="edit_image" required>

      <div class="modal-buttons">
        <button type="submit">Save</button>
        <button type="button" id="cancelEdit">Cancel</button>
      </div>
    </form>
  </div>
</div>

<!-- Edit Product Modal -->
<div id="editModal" style="display:none; position:fixed; left:50%; top:50%; transform:translate(-50%, -50%);
background:white; padding:20px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.3);">
    <h3>Edit Product</h3>
    <form id="editForm">
        <input type="hidden" name="id" id="edit-id">

        <label>Category ID:</label>
        <input type="text" name="categoryid" id="edit-categoryid"><br>

        <label>Name:</label>
        <input type="text" name="name" id="edit-name"><br>

        <label>Price:</label>
        <input type="number" name="price" id="edit-price" step="0.01"><br>

        <label>Cost:</label>
        <input type="number" name="cost" id="edit-cost" step="0.01"><br>

        <label>Barcode:</label>
        <input type="text" name="barcode" id="edit-barcode"><br>

        <label>Stocks:</label>
        <input type="number" name="stocks" id="edit-stocks"><br>

        <label>Receive Date:</label>
        <input type="date" name="receive_date" id="edit-receive_date"><br>

        <label>Expired Date:</label>
        <input type="date" name="expired_date" id="edit-expired_date"><br>

        <label>Supplier:</label>
        <input type="text" name="supplier" id="edit-supplier"><br>

        <button type="submit">Save</button>
        <button type="button" onclick="closeModal()">Cancel</button>
    </form>
</div>



<script>
const boxes = document.querySelectorAll(".product-box");
const productDetails = document.getElementById("productDetails");
const similarGrid = document.getElementById("similarGrid");

boxes.forEach(box => {
  box.addEventListener("click", () => {
    const data = box.dataset;

    productDetails.innerHTML = `
  <h2>${data.name}</h2>
  <table>
    <tr><td>ID</td><td id="id">${data.id}</td></tr>
    <tr><td>Category ID</td><td id="category">${data.category}</td></tr>
    <tr><td>Name</td><td contenteditable="false" id="name">${data.name}</td></tr>
    <tr><td>Price (RM)</td><td contenteditable="false" id="price">${data.price}</td></tr>
    <tr><td>Cost (RM)</td><td contenteditable="false" id="cost">${data.cost}</td></tr>
    <tr><td>Barcode</td><td contenteditable="false" id="barcode">${data.barcode}</td></tr>
    <tr><td>Stocks</td><td contenteditable="false" id="stocks">${data.stocks}</td></tr>
    <tr><td>Receive Date</td><td contenteditable="false" id="rd">${data.rd}</td></tr>
    <tr><td>Expired Date</td><td contenteditable="false" id="exp">${data.exp}</td></tr>
    <tr><td>Supplier</td><td contenteditable="false" id="supplier">${data.supplier}</td></tr>
  </table>

  <div class="action-buttons" style="justify-content: space-between; align-items: center; width: 95%;">
    <div class="status-boxes" style="display: flex; gap: 15px;">
      <label><input type="checkbox" id="promoBox"> Set as Promotion</label>
      <label><input type="checkbox" id="newBox"> Set as New Arrival</label>
    </div>
    <div>
      <button id="editBtn">Edit</button>
      <button id="saveBtn" style="display:none;">Save</button>
      <button id="cancelBtn" style="display:none;">Cancel</button>
    </div>
  </div>
`;

    const editableFields = ["name", "price", "cost", "barcode", "stocks", "rd", "exp", "supplier"]
      .map(id => document.getElementById(id));
    const editBtn = document.getElementById("editBtn");
    const saveBtn = document.getElementById("saveBtn");
    const cancelBtn = document.getElementById("cancelBtn");

    const original = {};
    editableFields.forEach(el => original[el.id] = el.textContent);

    editBtn.onclick = () => {
      editableFields.forEach(el => {
        el.contentEditable = true;
        el.style.borderBottom = "1px dashed #ff9800";
      });
      editBtn.style.display = "none";
      saveBtn.style.display = "inline-block";
      cancelBtn.style.display = "inline-block";
    };

    cancelBtn.onclick = () => {
      editableFields.forEach(el => {
        el.textContent = original[el.id];
        el.contentEditable = false;
        el.style.borderBottom = "none";
      });
      editBtn.style.display = "inline-block";
      saveBtn.style.display = "none";
      cancelBtn.style.display = "none";
    };

    saveBtn.onclick = async () => {
      const formData = new FormData();
      formData.append("id", data.id);
      editableFields.forEach(el => formData.append(el.id, el.textContent.trim()));

      const res = await fetch("update_product.php", { method: "POST", body: formData });
      if (res.ok) alert("Product updated successfully!");
      else alert("Failed to update product.");

      editableFields.forEach(el => {
        el.contentEditable = false;
        el.style.borderBottom = "none";
      });
      editBtn.style.display = "inline-block";
      saveBtn.style.display = "none";
      cancelBtn.style.display = "none";
    };

    similarGrid.innerHTML = "";
    for (let i = 1; i <= 3; i++) {
      const item = document.createElement("div");
      item.className = "similar-item";
      item.innerHTML = `<p>${data.name} Variant ${i}</p>`;
      similarGrid.appendChild(item);
    }
    
    // === Product Status Tick Boxes ===
const promoBox = document.getElementById("promoBox");
const newBox = document.getElementById("newBox");

// Fetch current status from database
fetch(`get_status.php?id=${data.id}`)
  .then(res => res.json())
  .then(result => {
    const status = (typeof result === "object" && result.status !== undefined)
      ? result.status
      : result;
    console.log("🔹 Status:", status);
    promoBox.checked = (status === 2 || status === 4);
    newBox.checked = (status === 3 || status === 4);
  })
  .catch(err => console.error("Status fetch error:", err));



// When checkbox changes → update DB
async function updateStatus() {
  let newStatus = 1; // default
  if (promoBox.checked && newBox.checked) newStatus = 4;
  else if (promoBox.checked) newStatus = 2;
  else if (newBox.checked) newStatus = 3;

  const fd = new FormData();
  fd.append("id", data.id);
  fd.append("status", newStatus);

  try {
    const res = await fetch("update_status.php", { method: "POST", body: fd });
    if (res.ok) console.log(`✅ Product ${data.id} status updated to`, newStatus);
    else alert("❌ Failed to update product status.");
  } catch (err) {
    console.error("Update error:", err);
  }
}

promoBox.addEventListener("change", updateStatus);
newBox.addEventListener("change", updateStatus);

    
  });
});

// === Search & Filter ===
const searchInput = document.getElementById("searchInput");
const categoryFilter = document.getElementById("categoryFilter");
const productList = document.getElementById("productList");

function filterProducts() {
  const search = searchInput.value.toLowerCase();
  const category = categoryFilter.value;

  document.querySelectorAll(".product-box").forEach(box => {
    const name = box.dataset.name.toLowerCase();
    const barcode = box.dataset.barcode.toLowerCase();
    const cat = box.dataset.category;

    const matchSearch = name.includes(search) || barcode.includes(search);
    const matchCategory = category === "" || cat === category;

    box.style.display = (matchSearch && matchCategory) ? "block" : "none";
  });
}

searchInput.addEventListener("input", filterProducts);
categoryFilter.addEventListener("change", filterProducts);

// Profile dropdown
const profilePic = document.getElementById("profilePic");
const profileMenu = document.getElementById("profileMenu");
profilePic.addEventListener("click", () => {
  profileMenu.style.display = profileMenu.style.display === "flex" ? "none" : "flex";
});
document.addEventListener("click", e => {
  if (!profilePic.contains(e.target) && !profileMenu.contains(e.target)) profileMenu.style.display = "none";
});

// === Edit Modal Logic ===
const editModal = document.getElementById("editModal");
const cancelEdit = document.getElementById("cancelEdit");
const editForm = document.getElementById("editForm");

// Open modal with product info
function openEditModal(product) {
  document.getElementById("edit_id").value = product.id;
  document.getElementById("edit_name").value = product.name;
  document.getElementById("edit_description").value = product.description;
  document.getElementById("edit_price").value = product.price;
  document.getElementById("edit_image").value = product.image_url;

  editModal.style.display = "flex";
}

// Close modal
cancelEdit.onclick = () => editModal.style.display = "none";
window.onclick = e => { if (e.target === editModal) editModal.style.display = "none"; };

// Save edited product
editForm.onsubmit = async (e) => {
  e.preventDefault();
  const formData = new FormData(editForm);

  try {
    const response = await fetch("update_product.php", {
      method: "POST",
      body: formData
    });

    const result = await response.text();
    alert(result);

    // Optional: reload page to refresh updated product
    location.reload();
  } catch (err) {
    alert("❌ Failed to update product.");
  }
};

// === Attach modal to Edit buttons ===
document.querySelectorAll(".edit-btn").forEach(btn => {
  btn.addEventListener("click", (e) => {
    const card = e.target.closest(".product-card");
    const product = {
      id: btn.getAttribute("onclick").match(/id=(\d+)/)[1],
      name: card.querySelector("h3").textContent,
      description: card.querySelector("p").textContent,
      price: card.querySelector(".price").textContent.replace("RM ", ""),
      image_url: card.querySelector("img").src
    };
    openEditModal(product);
  });
});





</script>
</body>
</html>
