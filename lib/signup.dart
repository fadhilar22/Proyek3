import 'package:flutter/material.dart';
import 'package:forasmile_mobile/login.dart';

class SignupPage extends StatefulWidget {
  const SignupPage({Key? key}) : super(key: key);

  @override
  _SignupPageState createState() => _SignupPageState();
}

class _SignupPageState extends State<SignupPage> {
  bool _isPasswordVisible = false;
  bool _isChecked = false;

  void _navigateToLoginScreen() {
    Navigator.push(
      context,
      MaterialPageRoute(builder: (context) => const LoginPage()),
    );
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        body: Container(
          margin: const EdgeInsets.all(24),
          child: ListView(
            children: [
              _header(context),
              _inputField(context),
              _signup(context),
            ],
          ),
        ),
      ),
    );
  }

  Widget _header(BuildContext context) {
    return Column(
      children: <Widget>[
        Image.asset(
          'assets/images/logo_fsa.png',
          height: 200,
        ),
      ],
    );
  }

  Widget _inputField(BuildContext context) {
    return Column(
      children: [
          TextField(
            decoration: InputDecoration(
              hintText: "E-mail",
              border: OutlineInputBorder(
                borderRadius: BorderRadius.circular(18),
                borderSide: BorderSide.none,
              ),
              fillColor: Colors.orangeAccent.withOpacity(0.1),
              filled: true,
              prefixIcon: const Icon(
                Icons.person,
                color: Colors.deepOrange,
              ),
            ),
          ),
          const SizedBox(height: 10),
          TextField(
            decoration: InputDecoration(
              hintText: "Nama",
              border: OutlineInputBorder(
                borderRadius: BorderRadius.circular(18),
                borderSide: BorderSide.none,
              ),
              fillColor: Colors.orangeAccent.withOpacity(0.1),
              filled: true,
              prefixIcon: const Icon(
                Icons.person,
                color: Colors.deepOrange,
              ),
            ),
          ),
          const SizedBox(height: 10),
          TextField(
            decoration: InputDecoration(
              hintText: "Nomor HP",
              border: OutlineInputBorder(
                borderRadius: BorderRadius.circular(18),
                borderSide: BorderSide.none,
              ),
              fillColor: Colors.orangeAccent.withOpacity(0.1),
              filled: true,
              prefixIcon: const Icon(
                Icons.phone,
                color: Colors.deepOrange,
              ),
            ),
          ),
          const SizedBox(height: 10),
          TextField(
            decoration: InputDecoration(
              hintText: "Alamat",
              border: OutlineInputBorder(
                borderRadius: BorderRadius.circular(18),
                borderSide: BorderSide.none,
              ),
              fillColor: Colors.orangeAccent.withOpacity(0.1),
              filled: true,
              prefixIcon: const Icon(
                Icons.location_on,
                color: Colors.deepOrange,
              ),
            ),
            maxLines: 3, // Multiline dengan 3 baris
          ),
          const SizedBox(height: 10),
          TextField(
            decoration: InputDecoration(
              hintText: "Username",
              border: OutlineInputBorder(
                borderRadius: BorderRadius.circular(18),
                borderSide: BorderSide.none,
              ),
              fillColor: Colors.orangeAccent.withOpacity(0.1),
              filled: true,
              prefixIcon: const Icon(
                Icons.person_outline,
                color: Colors.deepOrange,
              ),
            ),
          ),
          const SizedBox(height: 10),
          TextField(
            decoration: InputDecoration(
              hintText: "Password",
              border: OutlineInputBorder(
                borderRadius: BorderRadius.circular(18),
                borderSide: BorderSide.none,
              ),
              fillColor: Colors.orangeAccent.withOpacity(0.1),
              filled: true,
              prefixIcon: const Icon(
                Icons.lock,
                color: Colors.deepOrange,
              ),
              suffixIcon: IconButton(
                color: Colors.deepOrange,
                icon: Icon(
                  _isPasswordVisible ? Icons.visibility : Icons.visibility_off,
                ),
                onPressed: () {
                  setState(() {
                    _isPasswordVisible = !_isPasswordVisible;
                  });
                },
              ),
            ),
            obscureText: !_isPasswordVisible,
          ),
          const SizedBox(height: 10),
          TextField(
            decoration: InputDecoration(
              hintText: "Konfirmasi Password",
              border: OutlineInputBorder(
                borderRadius: BorderRadius.circular(18),
                borderSide: BorderSide.none,
              ),
              fillColor: Colors.orangeAccent.withOpacity(0.1),
              filled: true,
              prefixIcon: const Icon(
                Icons.lock,
                color: Colors.deepOrange,
              ),
              suffixIcon: IconButton(
                color: Colors.deepOrange,
                icon: Icon(
                  _isPasswordVisible ? Icons.visibility : Icons.visibility_off,
                ),
                onPressed: () {
                  setState(() {
                    _isPasswordVisible = !_isPasswordVisible;
                  });
                },
              ),
            ),
            obscureText: !_isPasswordVisible,
          ),
          const SizedBox(height: 10),
          Row(
            children: [
              Checkbox(
                value: _isChecked,
                onChanged: (bool? value) {
                  setState(() {
                    _isChecked = value!;
                  });
                },
              ),
              Text(
                "I have read and agree Terms & Services",
                style: TextStyle(color: Colors.deepOrange),
              ),
            ],
          ),
          const SizedBox(height: 10),
          ElevatedButton(
            onPressed: () {},
            style: ElevatedButton.styleFrom(
              minimumSize: const Size(double.infinity, 50),
              shape: const StadiumBorder(),
              padding: const EdgeInsets.symmetric(vertical: 16),
              backgroundColor: Colors.orangeAccent,
            ),
            child: const Text(
              "Sign Up",
              style: TextStyle(fontSize: 20),
            ),
          ),
        const SizedBox(height: 30),
      ],
    );
  }


  Widget _forgotPassword(BuildContext context) {
    return TextButton(
      onPressed: () {},
      child: Row(
        mainAxisAlignment: MainAxisAlignment.end, // Align kanan
        children: const [
          Text(
            "Forgot password?",
            style: TextStyle(color: Colors.orange),
          ),
        ],
      ),
    );
  }

  Widget _signup(BuildContext context) {
    return Column(
      mainAxisAlignment: MainAxisAlignment.center,
      children: <Widget>[
        const Text("Already Have an Account? "),
        ElevatedButton(
          onPressed: _navigateToLoginScreen,
          style: ElevatedButton.styleFrom(
            shape: const StadiumBorder(),
            padding: const EdgeInsets.symmetric(vertical: 2, horizontal: 10),
            backgroundColor: Colors.orangeAccent,
          ),
          child: const Text(
            "Login",
            style: TextStyle(fontSize: 16),
          ),
        ),
      ],
    );
  }
}
