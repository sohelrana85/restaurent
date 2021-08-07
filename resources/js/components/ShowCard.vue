<template>
	<div class="container py-4">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h6>Show Cart Item:</h6>
					</div>
					<div class="card-body">
						<table class="table table-bordered text-center" style="font-size: 14px">
							<thead>
								<tr>
									<th style="width: 20%">Photo</th>
									<th style="width: 30%">Food Name</th>
									<th style="width: 15%">Price</th>
									<th style="width: 15%">Quantity</th>
									<th style="width: 15%">Total</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="item in cartItems" :key="item.id">
									<td>
										<img
											:src="'food_image/' + item.attributes.image"
											alt=""
											style="width: 70px"
										/>
									</td>
									<td>{{ item.name }}</td>
									<td>Tk {{ item.price }}</td>
									<td>
										<input type="number" class="form-control" v-model="item.quantity" />
									</td>
									<td>Tk {{ item.price * item.quantity }}</td>
									<td>
										<i class="fas fa-trash btn btn-sm"></i>
									</td>
								</tr>
							</tbody>
							<tfoot class="font-weight-bold">
								<tr>
									<td colspan="4" style="text-align: right">Total =</td>
									<td>Tk {{ total }}</td>
								</tr>
								<tr>
									<td colspan="4" style="text-align: right">VAT =</td>
									<td>Tk {{ vat }}</td>
								</tr>
								<tr>
									<td colspan="4" style="text-align: right">Delivery Charge =</td>
									<td>Tk 60</td>
								</tr>
								<tr>
									<td colspan="4" style="text-align: right">Sub Total =</td>
									<td>Tk {{ subTotal }}</td>
								</tr>
							</tfoot>
						</table>
						<div style="text-align: center">
							<a @click="alert" class="btn btn-danger">Process My Order</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import axios from "axios";
export default {
	name: "Show Card",
	data() {
		return {
			cartItems: [],
			link: "/Precess-Order",
		};
	},
	mounted() {
		this.loadCart();
	},
	methods: {
		loadCart() {
			axios.get("/card-data").then((res) => {
				// console.log(res.data.data);
				// console.log(value);
				for (const [key, value] of Object.entries(res.data.data))
					this.cartItems.push(value);
			});
		},
		alert() {
			axios.post("/update-cart-data", { data: this.cartItems }).then((res) => {
				if (res.data.status == "success") {
					window.location.href = "/Precess-Order";
				}
			});
		},
	},
	created() {
		// console.log("created");
	},
	computed: {
		total() {
			let total = 0;
			let val = this.cartItems.filter((item) => {
				total += Number(item.price) * Number(item.quantity);
			});
			return total;
		},
		vat() {
			let vat = Number(this.total * 0.15).toFixed(0);
			return vat;
		},
		subTotal() {
			let subTotal = (Number(this.total) + Number(this.vat) + 60).toFixed(0);
			return subTotal;
		},
	},
};
</script>
