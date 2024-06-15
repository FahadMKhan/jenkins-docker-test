pipeline {
    agent any
    stages {
        stage('Example') {
            steps {
                echo 'Hello World'
            }
        }
        stage('Manual Approval') {
            steps {
                timeout(time: 15, unit: "MINUTES") {
	                    input message: 'Do you want to approve the deployment?', ok: 'Yes', abort: 'No' 
	                }
            }
        }
        stage('stage2') {
            steps {
                echo 'stage 2 executed'
            }
        }
      
    }
}
