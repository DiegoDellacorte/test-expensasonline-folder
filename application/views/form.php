<style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        .form__container {
            padding: 2rem;
            width: 300px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .input__container {
            margin-bottom: 1rem;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
<?php echo form_open('cliente/agregar') ?>
<?php
 $name = array(
	'name' => 'name',
	'placeholder' => 'Nombre del barrio o edificio',	
); 
 $email = array(
	'name' => 'email',
	'placeholder' => 'E-mail',	
); 
$planes = $planes->result();
$pagos = $pagos->result();
?>
<div class="container">
	<div class="form__container">
		<h2>Suscripci&oacute;n</h2>
		<?php if(isset($error)){ echo $error ; } ?> 
		<?php if(isset($cliente)){ var_dump($cliente); } ?> 
		<div class="input__container">
			<?php echo form_label('Nombre','name') ?>
			<?php echo form_input($name) ?>
		</div>
		<div class="input__container">
			<?php echo form_label('Email','email') ?>
			<?php echo form_input($email) ?>
		</div>
		<div class="input__container">
			<?php echo form_label('Plan','plan') ?>
			<select name="plan">
				<?php
					foreach($planes as $plan){ ?>				
					<option value="<?php echo $plan->id ?>" <?php echo ($this->input->post('plan') == $plan->id) ? 'selected' : '' ?>>
						<?php echo $plan->name . ' $' . $plan->costo ?>
					</option>
				<?php }
				?>		
			</select>	
		</div>
		<div class="input__container">
			<?php echo form_label('Forma de pago','pago') ?>
			<select name="pago">
				<?php
					foreach($pagos as $pago){ ?>				
					<option value="<?php echo $pago->id ?>" <?php echo ($this->input->post('pago') == $pago->id) ? 'selected' : '' ?>>
						<?php echo $pago->name ?>
					</option>
				<?php }
				?>		
			</select>	
		</div>
		<?php echo form_submit('','GUARDAR') ?>
		<?php echo form_close() ?>
	</div>
</div>
</body>
</html>